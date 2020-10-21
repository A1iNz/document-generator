<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\pos_m;

class Jenis_Dokumen_Controller extends Controller
{
    
    // public function index(){
    //     $title = 'Master Jenis Dokumen';
    //     return view('master.jenis_dokumen.index', compact('title'));
    // }

    // public function get_data(){
    //     return Datatables::of(pos_m::all())
    //     ->make(true);
    //     return view('master.jenis_dokumen.index');
    // }

    public function index(){
        $title = 'Master Jenis Dokumen';
        return view('master.Jenis_Dokumen.index', compact('title'));
    }

    public function get(){
        $model = pos_m::all();
        return view('master.Jenis_Dokumen.get', compact('model'));
    }

    public function create(){
        return view('master.Jenis_Dokumen.create');
    }

    public function edit($id){
        $model = pos_m::findOrFail($id);
        return view('master.Jenis_Dokumen.edit', compact('model'));
    }

    public function update(Request $request, $id){
        $request->validate(self::validasi());
        $model = pos_m::findOrFail($id);
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
        $request->validate(self::validasi());
        if(pos_m::create($request->all())){
            return [
                'success' => true,
                'message' => 'Data Berhasil Di Tambahkan'
            ];
        }else{
                return [
                    'success' => false,
                    'message' => 'Data Gagal Di Tambahkan'
                ];
        }
    }

    public function delete($id){
        $model = pos_m::find($id);
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
            '' => 'required',
            'password' => '',
            'host' => 'required|numeric',
            'port' => 'required|numeric',
        ];
    }

}