<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait{

    public function storageTraitUpload($request,$fieldName,$foderName)
    {
        if($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileName = $file->getClientOriginalName();
            $path = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileName);
            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($path)

            ];
            return $dataUploadTrait;
        }
        return null;
    }
    public function storageTraitUploadMutiple($file,$foderName)
    {
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileName);
            $dataUploadTrait = [
                'file_name' => $fileName,
                'file_path' => Storage::url($path)

            ];
            return $dataUploadTrait;
    }
}
