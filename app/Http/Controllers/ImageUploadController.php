<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{

    public function storeMedia(Request $request){
        $file = $request->file('file');
        $upload_id=$this->upload_file($request,'file');

        return response()->json([
            'name'          => $upload_id,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function upload_file($request, $name){
        $type = array(
            "jpg" => "image",
            "jpeg" => "image",
            "png" => "image",
            "svg" => "image",
            "webp" => "image",
            "gif" => "image",
            "mp4" => "video",
            "mpg" => "video",
            "mpeg" => "video",
            "webm" => "video",
            "ogg" => "video",
            "avi" => "video",
            "mov" => "video",
            "flv" => "video",
            "swf" => "video",
            "mkv" => "video",
            "wmv" => "video",
            "wma" => "audio",
            "aac" => "audio",
            "wav" => "audio",
            "mp3" => "audio",
            "zip" => "archive",
            "rar" => "archive",
            "7z" => "archive",
            "doc" => "document",
            "txt" => "document",
            "docx" => "document",
            "pdf" => "document",
            "csv" => "document",
            "xml" => "document",
            "ods" => "document",
            "xlr" => "document",
            "xls" => "document",
            "xlsx" => "document"
        );
        if ($request->hasFile($name)) {
            $upload = new Upload;
            $upload->file_original_name = null;

            $arr = explode('.', $request->file($name)->getClientOriginalName());

            for ($i = 0; $i < count($arr) - 1; $i++) {
                if ($i == 0) {
                    $upload->file_original_name .= $arr[$i];
                } else {
                    $upload->file_original_name .= "." . $arr[$i];
                }
            }

            $upload->user_id = Auth::user()->id;
            if($request->property_name){
                $fileName = $request->property_name.rand(111111,999999).'.'.$request->file($name)->getClientOriginalExtension();
            }else{
                $fileName = Str::uuid() . '.' . $request->file($name)->getClientOriginalName();
            }
            $upload->extension = $request->file($name)->getClientOriginalExtension();
            if (isset($type[$upload->extension])) {
                $upload->type = $type[$upload->extension];
            } else {
                $upload->type = "others";
            }
            $upload->file_size = $request->file($name)->getSize();
            $request->file($name)->move(public_path('uploads/all'), $fileName);
            if ($upload->file_size >= 102400) {

                if ($upload->extension == 'jpg' || $upload->extension == 'jpeg' || $upload->extension == 'png' || $upload->extension == 'svg' || $upload->extension == 'webp') {

                    $src = "uploads/all/" . $fileName;
                    $upload->file_size = compress($src, $src, 500, $fileName);
                }
            }
            $upload->file_name = 'uploads/all/' . $fileName;
            $upload->save();

            return  $upload->id;
        }
    }

}
