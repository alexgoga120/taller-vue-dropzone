<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersImage;
use App\Services\UploadFiles;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function getUsers(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'users' => User::with(['users_images'])->get()
        ]);
    }

    public function uploadImages(Request $request)
    {
        foreach ($request->file as $file) {
            $userImage = new UsersImage();
            $userImage->fk_id_user = $request->userId;
            $userImage->img_url = UploadFiles::storeFile($file, 'user_img');
            $userImage->saveOrFail();
        }
    }
}
