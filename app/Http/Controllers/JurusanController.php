<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan.index', [
            'jurusans' => $jurusans
        ]);
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'nama' =>'required|string|max:255',
            'deskripsi' =>'required|string',
        ])->validate();

        $jurusan = new Jurusan($validatedData);
        $jurusan->save();

        return redirect(route('daftarJurusan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
{
    return view('jurusan.edit', [
        'jurusan' => $jurusan
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validatedData = validator($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ])->validate();
    
        $jurusan->nama = $validatedData['nama'];
        $jurusan->deskripsi = $validatedData['deskripsi'];
        $jurusan->save();
    
        return redirect(route('daftarJurusan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
    return redirect(route('daftarJurusan'));
    }
}
