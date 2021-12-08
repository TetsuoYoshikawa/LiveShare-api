<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function get($user_id)
    {
        $follow = Follow::where('follower_id', $user_id)->get();
        return response()->json([
            'data' => $follow,
            'message' => 'OK',
        ], 200);
    }
    public function follow(Request $request)
    {
        $param = [
            "follower_id" => $request->follower_id,
            "following_id" => $request->following_id,
        ];
        $items = Follow::insert($param);
        return response()->json([
            'message' => 'Follow created successfully',
            'data' => $items,
        ], 200);
    }

    public function unfollow(Request $request)
    {
        $follow = Follow::where('follower_id', $request->follower_id)->where('following_id', $request->following_id)->delete();
        return response()->json([
            'message' => 'Follow Delete',
            'data' => $follow,
        ], 200);
    }
}
