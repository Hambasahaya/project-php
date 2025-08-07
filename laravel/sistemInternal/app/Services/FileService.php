<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileService
{

    public static function upload(UploadedFile $file, string $folder = 'uploads'): string
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs("{$folder}", $filename, 'public');
        return $filename;
    }
    public static function delete(string $path): void
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
