<?php

namespace App\Http\Controllers\backend;

use App\Component\MenuRecursive;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MenuRequest;
use App\Models\Menu;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    private $arr_children;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(4);
        return view('backend.menu.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('backend.menu.create', compact('optionSelect'));
    }

    public function store(MenuRequest $request)
    {
        $this->menu->create([
           'name' => $request['name'],
           'slug' => Str::slug($request['name']),
           'parent_id' => $request['parent_name']
        ]);
        Toastr::success('Message', 'Create Success');
        return redirect()->route('menu.index');
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecursive->menuRecursiveEdit($menu->parent_id);
        return view('backend.menu.edit', compact('optionSelect', 'menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = $this->menu->find($id);
        if(!is_null($menu->children)) {
            $this->checkChidrenRelashionship($menu);
        }
        if(in_array($request['parent_name'], $this->arr_children) || $id === $request['parent_name']) {
            dd(1);
        }
        $menu->update([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'parent_id' => $request['parent_name']
        ]);
        Toastr::success('Message', 'Update Success');
        return redirect()->route('menu.index');
    }

    public function delete($id)
    {
        $menu = $this->menu->find($id);
        $menu->delete();
        $this->menuRecursive->deleteRecursive($menu);
        Toastr::success('Message', 'Delete Success');
        return redirect()->route('menu.index');
    }

    public function checkChidrenRelashionship($data)
    {
        if(count($data->children)) {
            foreach ($data->children as $child) {
                $this->arr_children[] = $child->id;
                $this->checkChidrenRelashionship($child);
            }
        }
    }
}
