<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;
use App\Models\Komen;
use App\Models\User;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        if (isset($_GET['search'])) {
            $key = $_GET['search'];
            $content = Konten::where('judul', 'LIKE', "%$key%")->where('status', 2)->latest()->paginate(10);
        } else {
            $content = Konten::all();
        }
        return view('artikel.index', compact('content'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // @dd(auth()->user()->id);
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'konten' => ['required', 'string', 'min:5'],
            'gambar' => ['required', 'mimes:jpg,png,jpeg,svg']
        ]);

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->extension();
            $imgName = date('d-m-Y', time()) . '-' . time() . '.' . $extension;
            $file->move('artikel/picture',$imgName, 'public');
            // $file->storeAs('artikel/picture', $imgName, 'public');
        } else {
            $imgName = '';
        }

        $article = Konten::create([
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->konten,
            'image' => $imgName,
            'status' => 1,
        ]);

        session()->flash('success', 'Article was created successfully!');
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komen = Komen::where('konten_id', $id)->get();
        // @dd();
        // $user = User::where('id', )->get();
        $dd($user);
        $content = \App\Models\Konten::findOrFail($id);
        return view('artikel.show', compact('content', 'komen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
