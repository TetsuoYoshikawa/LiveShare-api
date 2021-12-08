<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function get(Request $request)
    {
        $items = Favorite::where('user_id', $request->user_id)->with('share', 'user', 'share.user')->get();
        return response()->json([
            'message' => 'OK',
            'data' => $items,
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "share_id" => $request->share_id,
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => 'Favotite created successfully',
            'data' => $param
        ], 200);
    }
    public function delete(Request $request)
    {
        $items = Favorite::where('user_id', $request->user_id)->where('share_id', $request->share_id)->delete();
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
