<?php
namespace App\Traits;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File ;

trait FileUploadTrait {
    public function uploadImage(Request $request, ?string $inputName, string $oldpath = null, string $path ='/uploads' ): ?string{
        if($request->hasFile($inputName)){
           $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
             $imageName = 'media_' . uniqid().'.' . $ext;

             $image->move(public_path($path), $imageName);

             $excludedFolder = '/default';

             if($oldpath && File::exists(public_path($oldpath)) && strpos($oldpath, $excludedFolder)!== 0){
                File::delete(public_path($oldpath));
             }
             return $path . '/' . $imageName;
        }
        return null;
    }

    public function uploadImageMultiple(Request $request, ?string $inputName, string $path ='/uploads' ): ?array{
        if($request->hasFile($inputName)){
           $images = $request->{$inputName};

           $paths = [];

           foreach($images as $image){
            $ext = $image->getClientOriginalExtension();
             $imageName = 'media_' . uniqid().'.' . $ext;

             $image->move(public_path($path), $imageName);

             $paths[] = $path . '/' . $imageName;


            }
             return $paths;
        }
        return null;
    }
    public function deleteFile($path):void{
        $excludedFolder = '/default';

        if($path && File::exists(public_path($path)) && strpos($path, $excludedFolder)!== 0){
           File::delete(public_path($path));
        }
    }
}
