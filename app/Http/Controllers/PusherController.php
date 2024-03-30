<?php

namespace App\Http\Controllers;

use App\Models\Messagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PusherController extends Controller
{
    public function index(): View
    {
        $message = Messagers::all();

        return view('index',[
            'messages' => $message
        ]);
    }

    public function store(Request $request)
    {
        $username = $request->input('username');
        $text = $request->input('text');

        if (
            isset($username) &&
            isset($text)
        ) {

            DB::table('messagers')->insert(
                [
                    'username' => $username,
                    'message' => $text,
                ]
            );
        }
        
        return response()->json([
            'username' => $username,
            'message' => $text,
        ], 200);
    }
}
