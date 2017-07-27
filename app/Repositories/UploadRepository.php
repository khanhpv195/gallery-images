<?php

namespace App\Repositories;

use Log;
use App\Upload;
use Auth;

class UploadRepository
{
    static public function all()
    {
        $user = Auth::user();
        $upload = Upload::where('user_id', $user['id'])->get();
        if ($upload) {
            return $upload;
        }
        return false;
    }

    static public function upload($image = [])
    {
        if (empty($image)){
            return false;
        }
        try {
            $user = Auth::user();
            $upload = [
                'image_name' => $image->getClientOriginalName(),
                'url' => './images/' . $image->getClientOriginalName(),
                'user_id' => $user['id']
            ];
           $data = new Upload();
           $data->fill($upload);
           $createFile = $data->saveOrFail();
           return $createFile;
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return false;
        }

    }
}

