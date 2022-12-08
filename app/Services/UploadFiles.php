<?php

namespace App\Services;


class UploadFiles
{
    /**
     * @param $file \Illuminate\Http\UploadedFile
     * @param string $pathType
     * @return string
     */
    public static function storeFile($file, $pathType = '')
    {
        $path = '/uploads/' . $pathType . '/';
        $filename = explode(".", $file->getClientOriginalName());
        $name = str_replace('.', '',
                (string)microtime(true)) . '_' . '.' . (end($filename));

        if (!file_exists(public_path() . $path)) {
            mkdir(
                public_path() . $path,
                0777,
                true
            );
        }

        $file->move(public_path() . $path, $name);
        return url('/') . $path . $name;
    }

}
