<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\Providers\Storage as ProvidersStorage;

class UserController extends Controller
{
    public function get()
    {
        $user = User::with('followUsers')->get();
        return response()->json([
            "message" => 'OK',
            'data' => $user,
        ], 200);
    }
    public function getProfile($user_id)
    {
        $item = User::where('id', $user_id)->get();
        return response()->json([
            "data" => $item,
            "message" => "Get User successfully"
        ], 200);
    }
    public function putImage(Request $request)
    {
        $image_url = $request->image_url;
        $path = Storage::disk('s3')->putFile('/', $image_url, 'public');
        $param = [
            "id" => $request->id,
            "image_url" => $path,
        ];
        $item = User::where('id', $request->id)->update($param);
        return response()->json([
            "message" => "OK",
            "data" => $param,
        ], 200);
    }
    public function putProfile(Request $request)
    {
        $param = [
            "content" => $request->content,
            "id" => $request->id
        ];
        $item = User::where('id', $request->id)->update($param);
        return response()->json([
            "data" => $param,
            "message" => "OK"
        ], 200);
    }
}
