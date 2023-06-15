<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{

    public static function imageUpload($file, $filePath)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = md5($filename) . '-' . time() . '.' . $extension;

        $path = Storage::disk($_ENV['FILESYSTEM_DISK'])->put($filePath, $file);

        return $path;
    }

    public static function fileRemove($path)
    {
        Storage::delete($path);
        return true;
    }
}
