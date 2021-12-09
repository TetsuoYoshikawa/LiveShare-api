<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Share;
use App\Models\Favorite;
use App\Models\Want;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SharesController extends Controller
{
    public function get()
    {
        $items = Share::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    public function post(Request $request)
    {
        $image_url = $request->image_url;
        $path = Storage::disk('s3')->putFile('/', $image_url, 'public');
        $item = new Share;
        $item->share = $request->share;
        $item->user_id = $request->user_id;
        $item->artist = $request->artist;
        $item->date = $request->date;
        $item->area = $request->area;
        $item->image_url = $path;
        $item->tag_id = $request->tag_id;
        $item->save();
        return response()->json([
            'message' => 'Share created successfully',
            'data' => $item
        ], 200);
    }

    public function show(Share $share)
    {
        $item = Share::where('id', $share->id)->first();
        $favorite = Favorite::where('share_id', $share->id)->get();
        $want = Want::where('share_id', $share->id)->get();
        $comment = Comment::where('share_id', $share->id)->get();
        $user_id = $share->user_id;
        $user = User::where('id', (int)$user_id)->first();
        $commnet_data = array();
        $items = [
            "share" => $item,
            "favorite" => $favorite,
            "want" => $want,
            "comment" => $comment,
            "name" => $user->name,
            "image_url" => $user->image_url
        ];
        return response()->json($items, 200);
    }

    public function getShare(Request $request, $user_id)
    {
        $items = Share::where('user_id', $user_id)->with('user', 'comments', 'favorites', 'wants')->get();
        return response()->json($items, 200);
    }


    public function postShare(Request $request)
    {
        $item = new Share;
        $item->share = $request->share;
        $item->user_id = $request->user_id;
        $item->artist = $request->artist;
        $item->date = $request->date;
        $item->area = $request->area;
        $item->image_url = $request->image_url;
        $item->tag_id = $request->tag_id;
        $item->save();
        return response()->json([
            'message' => 'Share created successfully',
            'data' => $item
        ], 200);
    }

    public function delete(Share $share)
    {
        $item = Share::where('id', $share->id)->delete();
        if ($item) {
            return response()->json(
                ['message' => 'Share deleted successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'Share not found'],
                404
            );
        }
    }
}
