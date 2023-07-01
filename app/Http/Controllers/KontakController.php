<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::where('user_auth', Auth::user()->name)->get();

        return view('pages.kontak.index', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kontak.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kontak = Kontak::create([
            'nama'         => $request->nama,
            'email'        => $request->email,
            'no_telp'  => $request->no_telp,
            'user_auth'  => Auth::user()->name,
        ]);

        return redirect()->route('kontak.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = Kontak::find($id);

        return view('pages.kontak.edit', compact('kontak'));
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
        $kontak = Kontak::findOrFail($id);

        $kontak->update([
            'nama'         => $request->nama,
            'email'        => $request->email,
            'no_telp'  => $request->no_telp,
        ]);

        return redirect()->route('kontak.index')->with('update', 'Data berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = Kontak::find($id);

        $kontak->delete();

        return redirect()->route('kontak.index')->with('delete', 'Data berhasil dihapus');
    }
}
