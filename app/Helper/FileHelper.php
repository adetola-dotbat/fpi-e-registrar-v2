<?php

namespace App\Helper;

class FileHelper
{
    public static function uploadsImage($fileName, $request, $path)
    {
        $file = $request->file($fileName);
        $file_name = self::generateFileName($file);
        $file_path = $file->storeAs(
            $path,
            $file_name
        );
        // $file_path = $file_path;
        return $file_name;
    }

    public static function generateFileName($file)
    {
        $file_name = $file->getClientOriginalName();
        $file_name = time() . '_' . $file_name;
        return $file_name;
    }

    public static function deleteImageFile($path, $image_name)
    {
        if (empty($image_name)) {
            return;
        }
        preg_match('/(\w*\..*)/', $image_name, $matches);
        $path = storage_path() . '/app/' . $path . '/' . $matches[0];
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
