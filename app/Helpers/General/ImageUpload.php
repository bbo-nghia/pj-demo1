<?php

namespace App\Helpers\General;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * Class ImageUpload
 */
class ImageUpload
{
    /**
     * Upload image function
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string                        $folderPath
     * @param bool                          $hasThumb
     * @param bool                          $useTimeStamp
     *
     * @return bool|string
     */
    public function uploadImage($image, $folderPath, $hasThumb = true, $useTimeStamp = true)
    {
        if (empty($image) || empty($folderPath)) {
            return false;
        }

        $filename        = $this->_getFileName($image, false, $useTimeStamp);
        $destinationPath = public_path($folderPath);

        // create folder for profile image if not exist
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0775, true);
        }

        $thumbNailName = '';

        try {
            // save main image
            $originalImg = Image::make($image);
            $originalImg->save($this->_getImagePath($folderPath, $filename));

            // check if request has thumbnail
            if ($hasThumb) {
                $thumbNailName = $this->_getFileName($image, true, $useTimeStamp);

                // resize image for thumbnail copy
                $originalImg->resize(120, 120);

                // save thumbnail image
                $originalImg->save($this->_getImagePath($folderPath, $thumbNailName));
            }

            return json_encode(
                [
                    'main_file_name'  => $filename,
                    'thumb_file_name' => $thumbNailName,
                    'file_extension'  => $image->getClientOriginalExtension(),
                    'main_path'       => $folderPath . '/' . $filename,
                    'thumb_path'      => $folderPath . '/' . $thumbNailName
                ]
            );
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get Image file name with extension
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param bool                          $isThumb
     * @param bool                          $useTimeStamp
     *
     * @return string
     */
    private function _getFileName($image, $isThumb = false, $useTimeStamp = true)
    {
        $name = $useTimeStamp ? $image->getClientOriginalName() . time() : $image->getClientOriginalName();
        $hashedImg = md5($name);

        if ($isThumb) {
            return $hashedImg . '_thumb' . '.' . $image->getClientOriginalExtension();
        }

        return $hashedImg . '.' . $image->getClientOriginalExtension();
    }

    /**
     * Get Image path
     *
     * @param string $folderPath
     * @param string $filename
     *
     * @return string
     */
    private function _getImagePath($folderPath, $filename)
    {
        return public_path($folderPath . '/' . $filename);
    }

    /**
     * @param $path
     * @param $destinationPath
     * @return bool|string
     */
    public function copyImageByPath($path, $destinationPath)
    {
        if (!File::exists($path)) {
            return false;
        }

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0775, true);
        }

        $imageName = strrchr($path, '/');
        if (!$imageName) {
            $imageName = $path;
        }

        return File::copy($path, $destinationPath . $imageName);
    }

    /**
     * @param $path
     * @return bool|string
     */
    public function getImageNameByPath($path)
    {
        if (!File::exists($path)) {
            return false;
        }

        $nameWithSlash = strrchr($path, '/');
        if (!$nameWithSlash) {
            return $path;
        }

        return substr($nameWithSlash, 1);
    }

    /**
     * @param      $image
     * @param      $folderPath
     * @param bool $hasThumb
     */
    public function removeUploadImage($fileName, $folderPath, $hasThumb = true)
    {
        $extension    = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadedName = md5($fileName) . '.' . $extension;
        if (File::exists($folderPath . '/' . $uploadedName)) {
            unlink($folderPath . '/' . $uploadedName);
        } elseif (File::exists($folderPath . '/' . $fileName)) {
            unlink($folderPath . '/' . $fileName);
        }
        if ($hasThumb) {

            $thumbNailName = md5($fileName) . '_thumb.' . $extension;
            if (File::exists($folderPath . '/' . $thumbNailName)) {
                unlink($folderPath . '/' . $thumbNailName);
            } else {
                $thumbNailName = explode('.', $fileName);
                if (!empty($thumbNailName)) {
                    $imageName = $thumbNailName[0] . '_thumb.' . $thumbNailName[1];
                    if (File::exists($folderPath . '/' . $imageName)) {
                        unlink($folderPath . '/' . $imageName);
                    }
                }
            }
        }
    }
}
