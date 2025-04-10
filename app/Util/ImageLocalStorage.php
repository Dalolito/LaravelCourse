<?php
namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): void
    {
        if ($request->hasFile('profile_image')) {
            Storage::disk('public')->put(
                'test.png',
                file_get_contents($request->file('profile_image')->getRealPath())
            );
        }
    }
}
