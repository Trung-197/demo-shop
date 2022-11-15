<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use App\Component\Recursive;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    private $arr_children;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->arr_children = [];
    }

    public function getCategory($parentId)
    {
        $categories = $this->category->all();
        $recursive = new Recursive($categories);
        return $recursive->categoryRecursive($parentId);
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(4);
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory('');
        return view('backend.category.create', compact('htmlOption'));
    }

    public function store(CategoryRequest $request)
    {
        $this->category->create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'parent_id' => $request['parent_name']
        ]);
        Toastr::success('Message', 'Create Success');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('backend.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->find($id);
        if(!is_null($category->children)) {
            $this->checkChidrenRelashionship($category);
        }
        if(in_array($request['parent_name'], $this->arr_children) || $id === $request['parent_name']) {
            dd(1);
        }
        $category->update([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'parent_id' => $request['parent_name']
        ]);
        Toastr::success('Message', 'Update Success');
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = $this->category->find($id);
        $category->delete();
        $recursive = new Recursive($this->category);
        $recursive->deleteRecursive($category);
        Toastr::success('Message', 'Delete Success');
        return redirect()->route('category.index');
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
