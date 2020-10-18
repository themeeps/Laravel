<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProsesDetailController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $prosess = DB::table('proses')->get();
        $proses_details = DB::table('proses_detail')
        ->join('proses', 'proses_detail.proses_id', '=', 'proses.id')
        ->select('proses_detail.*', 'proses.status')->get();
        return view('proses_detail', ['proses_details' => $proses_details, 'prosess'=>$prosess]);
    }

    public function delete($id)
    {
        
        if(DB::table('proses_detail')->where('id', intval($id))->delete()){
            return redirect('process-detail');
        }else{
            echo intval($id);
            exit;
        }
        
    }
    public function update(Request $request)
    {

          $id = $request->input('id');
          $proses_id = $request->input('status');
          $deskripsi = $request->input('deskripsi');
          $anggaran_biaya = $request->input('anggran_biaya');
          $alamat_project = $request->input('alamat_project');


            $affected = DB::table('proses_detail')
                ->where('id', $id)
                ->update(
                    [
                        'proses_id' => $proses_id,
                        'deskripsi' => $deskripsi,
                        'anggran_biaya' => $anggaran_biaya,
                        'alamat_project' => $alamat_project,
                    ]
            );
            return redirect('process-detail');

    }


    public function add(Request $request)
    {
            $proses_id = $request->input('proses_id');
            $deskripsi = $request->input('deskripsi');
            $anggaran_biaya = $request->input('anggaran_biaya');
            $alamat_project = $request->input('alamat_project');


            
            

            $id =  DB::table('proses_detail')->insert([
                [
                    'proses_id' => $proses_id,
                    'deskripsi' => $deskripsi,
                    'anggaran_biaya' => $anggaran_biaya,
                    'alamat_project' => $alamat_project,
                ]
            ]);

            return redirect('process-detail');
    }
}