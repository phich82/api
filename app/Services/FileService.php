<?php

namespace App\Services;

class FileService
{
    public function getFileLang()
    {
        $fileLang = storage_path().'/app/public/json/langs.json';

        if (file_exists($fileLang) && is_readable($fileLang)) {
            return json_decode(file_get_contents($fileLang), true);
        }
        return null;
    }
}
