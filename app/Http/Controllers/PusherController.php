<?php

namespace App\Http\Controllers;

use App\Models\Messagers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PusherController extends Controller
{
    public function index()
    {
        $message = Messagers::all();

        return view('content.chat',[
            'messages' => $message
        ]);
    }

    public function all()
    {
        if(\request()->ajax())
        {
            $message = Messagers::all();

            return view('all',[
                'messages' => $message
            ]);
        }

        abort(404);
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
