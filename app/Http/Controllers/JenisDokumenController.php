<?php

namespace App\Http\Controllers;

use DataTables;
use App\jenis_dokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    
    // public function index(){
    //     $title = 'Master Jenis Dokumen';
    //     return view('master.jenis_dokumen.index', compact('title'));
    // }
        
    // public function get(){
    //     $model = jenis_dokumen::all();
    //     return view('master.Jenis_Dokumen.get', compact('model'));
    // }

    public function get(){
        return Datatables::of(jenis_dokumen::all())
        ->make(true);
        return view('master.jenis_dokumen.index');
    }

    public function index(){
        $title = 'Master Jenis Dokumen';
        return view('master.Jenis_Dokumen.index', compact('title'));
    }

    public function create(){
        return view('master.Jenis_Dokumen.create');
    }

    public function edit($id){
        $model = jenis_dokumen::findOrFail($id);
        return view('master.Jenis_Dokumen.edit', compact('model'));
    }

    public function update(Request $request, $id){
        $request->validate(self::validasi());
        $model = jenis_dokumen::findOrFail($id);
        if($model->update($request->all())){
            return [
                'success' => true,
                'message' => 'Data Berhasil Di Update'
            ];
        }else{
                return [
                    'success' => false,
                    'message' => 'Data Gagal Di Update'
                ];
        }
    }

    public function store(Request $request){
        dd($request->file('file'));
        // $request->validate(self::validasi());
        // if(jenis_dokumen::create($request->all())){
        //     return [
        //         'success' => true,
        //         'message' => 'Data Berhasil Di Tambahkan'
        //     ];
        // }else{
        //         return [
        //             'success' => false,
        //             'message' => 'Data Gagal Di Tambahkan'
        //         ];
        // }
    }

    public function delete($id){
        $model = jenis_dokumen::find($id);
            if($model){
                if($model->delete()){
                    return [
                        'success' => true,
                        'message' => 'Data Berhasil Di Hapus'
                    ];
                }else{
                    return [
                        'success' => false,
                        'message' => 'Data Gagal Di Hapus'
                    ];
                }
            }else{
                return [
                    'success' => false,
                    'message' => 'Data Tidak Di Temukan'
                ];
            }
    }

    public function validasi(){
        return [
            'nama_surat' => 'required',
            'object' => 'required',
            'file' => 'required',
        ];
    }

}
