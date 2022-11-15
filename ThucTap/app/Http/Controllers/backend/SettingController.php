<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SettingRequest;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use http\Env\Request;

class SettingController extends Controller
{
    public function  __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('backend.setting.index',compact('settings'));
    }
    public function create()
    {
        return view('backend.setting.create');
    }
    public function store(SettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type ?? 'text'
        ]);
        Toastr::success('Message', 'Create Success');
        return redirect()->route('settings.index');
    }
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('backend.setting.edit',compact('setting'));
    }
    public function update(SettingRequest $request,$id)
    {
        $this->setting->find($id)->update([
           'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        Toastr::success('Message', 'Update Success');
        return redirect()->route('settings.index');
    }
    public function delete($id)
    {
        $setting = $this->setting->find($id);
        $setting->delete();
        Toastr::success('Message', 'Delete Success');
        return redirect()->route('settings.index');
    }
}
