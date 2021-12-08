<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function get(Request $request)
    {
        $item = Comment::where('share_id', $request->share_id)->with('user', 'share')->get();
        return response()->json([
            "data" => $item,
            "message" => "OK"
        ], 200);
    }
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('comments')->insert($param);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $items = Comment::where('user_id', $request->user_id)->where('shere_id', $request->shere_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Favorite deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
    }
}
