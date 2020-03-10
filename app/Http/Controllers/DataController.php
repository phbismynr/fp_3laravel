<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataMhs = [
            ['nim' => '17090001', 'nama' => 'Siswa 1', 'kelas' => '6A'],
            ['nim' => '17090002', 'nama' => 'Siswa 2', 'kelas' => '6B'],
            ['nim' => '17090003', 'nama' => 'Siswa 3', 'kelas' => '6C'],
            ['nim' => '17090004', 'nama' => 'Siswa 4', 'kelas' => '6D'],
        ];

        if($request->query('kelas')){
            $dataMhs = array_filter($dataMhs, function($kelas){
                return $kelas['kelas'] == request()->kelas;
            });
        }

        return view('data', compact('dataMhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('data.index')->with('message', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $dataMhs = [
            ['nim' => '17090001', 'nama' => 'Siswa 1', 'kelas' => '6A'],
            ['nim' => '17090002', 'nama' => 'Siswa 2', 'kelas' => '6B'],
            ['nim' => '17090003', 'nama' => 'Siswa 3', 'kelas' => '6C'],
            ['nim' => '17090004', 'nama' => 'Siswa 4', 'kelas' => '6D'],
        ];

        if($nim){
            $dataMhs = array_filter($dataMhs, function($nim){
                return $nim['nim'] == request()->segment(count(request()->segments()));
            });
        }

        return view('data-detail', compact('dataMhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $dataMhs = [
            ['nim' => '17090001', 'nama' => 'Siswa 1', 'kelas' => '6A'],
            ['nim' => '17090002', 'nama' => 'Siswa 2', 'kelas' => '6B'],
            ['nim' => '17090003', 'nama' => 'Siswa 3', 'kelas' => '6C'],
            ['nim' => '17090004', 'nama' => 'Siswa 4', 'kelas' => '6D'],
        ];

        $dataMhs = array_filter($dataMhs, function($nim){
            return $nim['nim'] == request()->segment(count(request()->segments())-1);
        });

        return view('data-edit',compact('dataMhs'));
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
        return redirect()->route('data.index')->with('message', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('data.index')->with('message', 'Data anda telah dihapus!');
    }
}
