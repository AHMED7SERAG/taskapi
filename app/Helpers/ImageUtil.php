<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageUtil {

    /**
     * For get shop images from storage
     *
     * @param integer $shopId
     * @param string $tmpFolder
     * @param string $imageName
     *
     * @return string $path
     */
    static function shopEditRequestImage($shopId, $tmpFolder, $imageName){
        return asset(Storage::url('public/shops/' . $shopId . '/merchant-edit-requests/' . $tmpFolder . '/' . $imageName));
    }

}

