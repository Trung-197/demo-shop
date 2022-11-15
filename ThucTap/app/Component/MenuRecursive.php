<?php

namespace App\Component;

use App\Models\Menu;

class MenuRecursive {

    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecursiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $value) {
            $this->html .= '<option value="'. $value->id .'">'. $subMark . $value->name .'</option>>';
            $this->menuRecursiveAdd($value->id, $subMark . ' -');
        }
        return $this->html;
    }

    public function menuRecursiveEdit($parent_id_edit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $value) {
            if ($parent_id_edit === $value->id) {
                $this->html .= '<option selected value="'. $value->id .'">'. $subMark . $value->name .'</option>>';
            } else {
                $this->html .= '<option value="'. $value->id .'">'. $subMark . $value->name .'</option>>';
            }
            $this->menuRecursiveEdit($parent_id_edit, $value->id, $subMark . ' -');
        }
        return $this->html;
    }

    public function deleteRecursive($data)
    {
        if(count($data->children)) {
            foreach ($data->children as $child) {
                $child->delete();
                $this->deleteRecursive($child);
            }
        }
    }
}
