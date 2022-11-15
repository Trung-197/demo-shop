<?php

namespace App\Component;

class Recursive {

    private $data;
    private $htmlSelect;

    public function __construct($data)
    {
        $this->data = $data;
        $this->htmlSelect = '';
    }

    public function categoryRecursive($parentId, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] === $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $text . ' ' . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $value['id'] . "'>" . $text . ' ' . $value['name'] . "</option>";
                }
                $this->categoryRecursive($parentId, $value['id'], $text. '-');
            }
        }
        return $this->htmlSelect;
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
