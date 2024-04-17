<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, $destinationPath): ?string
    {
        $allowedExtensions = ['jpg', 'png', 'jpeg', 'gif'];

        $originalFilename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);

        if (!in_array(strtolower($extension), $allowedExtensions)) {
            return null;
        }

        $filename = $filenameWithoutExtension . '_' . uniqid() . '.' . $extension;
        $counter = 1;
        while (file_exists($destinationPath . '/' . $filename)) {
            $filename = $filenameWithoutExtension . '_' . $counter . '_' . uniqid() . '.' . $extension;
            $counter++;
        }
        $file->move($destinationPath, $filename);

        return $filename;
    }
}

