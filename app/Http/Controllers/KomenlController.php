<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use App\Models\User;
use Illuminate\Http\Request;

class KomenlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'komen' => ['required']
        ]);

        $comment = Komen::create([
            'user_id' => auth()->user()->id,
            'konten_id' => $id,
            'komen' => $request->komen,
        ]);
        return redirect()->back();
    }
}
