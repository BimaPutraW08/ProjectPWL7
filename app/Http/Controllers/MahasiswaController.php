<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search
        $search =$request->search;
        if(strlen($request->search)){
            $mahasiswas = Mahasiswa::where('nim', 'like', "%$search%")
            ->orWhere('Nama', 'like', "%$search%")
            ->orWhere('Email', 'like', "%$search%")
            ->paginate(5);
        } else {
            $mahasiswas = DB::table('mahasiswas')->paginate(5);    
        }
        //fungsi eloquent menampilkan data menggunakan pagination 
        // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);  
           
        return view('mahasiswas.index', ['mahasiswas' => $mahasiswas]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data 
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required', 
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
            'Email' => 'required',
            'No_Handphone' => 'required', 
        ]); 
 
        //fungsi eloquent untuk menambah data 
        Mahasiswa::create($request->all()); 
 
        //jika data berhasil ditambahkan, akan kembali ke halaman utama         
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa 
        $Mahasiswa = Mahasiswa::find($Nim); 
        return view('mahasiswas.detail', compact('Mahasiswa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit 
        $Mahasiswa = Mahasiswa::find($Nim); 
        return view('mahasiswas.edit', compact('Mahasiswa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data 
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required', 
            'Kelas' => 'required', 
            'Jurusan' => 'required', 
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]); 
 
        //fungsi eloquent untuk mengupdate data inputan kita 
        Mahasiswa::find($Nim)->update($request->all());  
        //jika data berhasil diupdate, akan kembali ke halaman utama 
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data          Mahasiswa::find($Nim)->delete(); 
        return redirect()->route('mahasiswas.index')-> with('success', 'Mahasiswa Berhasil Dihapus'); 

    }
}
