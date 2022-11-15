<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function show()
    {
        $categoryLimit = Category::where('parent_id',0)->take(3)->get();
        $products = $this->getProduct();
        return view('carts.index', [
            'products' => $products,
            'carts' => Session::get('carts'),
            'categoryLimit' => $categoryLimit
        ]);
    }
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'feature_image_path', 'content')
            ->whereIn('id', $productId)
            ->get();
    }
    public function index(Request $request)
    {
        $result = $this->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->route('carts');
    }

    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('Message', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
    }


    public function update(Request $request)
    {
        $this->edit($request);
        return redirect()->route('carts');

    }
    public function edit($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return redirect()->route('carts');
    }

    public function addCart(Request $request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);
            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            Session::flash('Message', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('Message', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return redirect()->route('carts');
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'feature_image_path', 'content')
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }

        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

}
