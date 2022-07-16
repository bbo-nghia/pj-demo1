<?php

if (!function_exists('uploadImage')) {
    /**
     * Upload image
     *
     * @param \Illuminate\Http\UploadedFile $imageFile       image file
     * @param string                        $destinationPath destination path
     * @param boolean                       $hasThumb        has thumbnail flag
     * @param boolean                       $useTimestamp    use timestamp flag
     *
     * @return boolean|string
     */
    function uploadImage($imageFile, $destinationPath, $hasThumb = true, $useTimestamp = true)
    {
        return app()->make(\App\Helpers\General\ImageUpload::class)
                    ->uploadImage($imageFile, $destinationPath, $hasThumb, $useTimestamp)
            ;
    }
}

if (!function_exists('removeUploadImage')) {
    /**
     * Remove upload image
     *
     * @param \Illuminate\Http\UploadedFile $imageFile       image file
     * @param string                        $destinationPath destination path
     * @param boolean                       $hasThumb        has thumbnail flag
     *
     * @return boolean|string
     */
    function removeUploadImage($imageFile, $destinationPath, $hasThumb = true)
    {
        return app()->make(\App\Helpers\General\ImageUpload::class)
                    ->removeUploadImage($imageFile, $destinationPath, $hasThumb)
            ;
    }
}
