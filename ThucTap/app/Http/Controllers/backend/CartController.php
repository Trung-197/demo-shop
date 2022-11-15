<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('backend.order.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->getCustomer()
        ]);
    }
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }
    public function show(Customer $customer)
    {
        $carts = $this->getProductForCart($customer);

        return view('backend.order.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'feature_image_path');
        }])->get();
    }
}
