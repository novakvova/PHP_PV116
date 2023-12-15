<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function getList() {
        $data = Categories::all();
        return response()->json($data)
            ->header("Content-Type", "application/json; charset=utf8");
    }

    public function create(Request $request) {
        $input = $request->all();
        $image = $request->file("image");
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        $imageName=uniqid().".webp";
        $sizes = [50,150,300,600,1200];
        foreach ($sizes as $size) {
            // read image from file system
            $imageSave = $manager->read($image);
            // resize image proportionally to 600px width
            $imageSave->scale(width: $size);
            $path = public_path("upload/".$size."_".$imageName);
            // save modified image in new format
            $imageSave->toWebp()->save($path);
        }
        $input["image"]=$imageName;
        $category = Categories::create($input);
        return response()->json($category,201,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
