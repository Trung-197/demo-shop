<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use http\Client\Request;
use Symfony\Component\Console\Input\Input;
use function view;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider= $slider;
    }

    public function index()
    {
        $sliders = $this->slider->paginate(15);
        return view('backend.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('backend.slider.create');
    }
    public function store(SliderRequest $request)
    {
//        if($request->has('image_path')) {
//            $file = $request->image_path;
//            $ext = $request->image_path->extension();
//            $file_name = time().'-'.'image_path.'.$ext;
//            $file->move(public_path('sliders'),$file_name);
//        }
//        $request->merge(['image_path'=>$file_name]);
        if($request->has('image_path'))
        {
            $request->file('image_path')->move(public_path('/sliders/'), $request->file('image_path')->getClientOriginalName());
            $request->image_path = $request->file('image_path')->getClientOriginalName();
        }
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $request->image_path
        ];
        $this->slider->create($dataInsert);
        Toastr::success('Message', 'Create Success');
        return redirect()->route('slider.index');
    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('backend.slider.edit',compact('slider'));
    }
    public function update(SliderRequest $request, $id)
    {
        if($request->hasFile('image_path'))
        {
            $request->file('image_path')->move(public_path('/sliders/'), $request->file('image_path')->getClientOriginalName());
            $request->image_path = $request->file('image_path')->getClientOriginalName();
        }
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $request->image_path
        ];
        $this->slider->find($id)->update($dataUpdate);
        Toastr::success('Message', 'Update Success');
        return redirect()->route('slider.index');
    }
    public function delete($id)
    {
        $slider = $this->slider->find($id);
        $slider->delete();
        Toastr::success('Message', 'Delete Success');
        return redirect()->route('slider.index');
    }
}
