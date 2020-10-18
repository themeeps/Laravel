<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $users = DB::table('user')->get();
        $kontraktors = DB::table('kontraktor')->get();
        $prosess = DB::table('proses')
        ->join('kontraktor', 'proses.kontraktor_id', '=', 'kontraktor.id')
        ->join('user', 'proses.user_id', '=', 'user.id')
        ->select('proses.*', 'kontraktor.nama_kontraktor', 'user.nama_user')->get();
        return view('proses', ['prosess' => $prosess, 'users'=>$users, 'kontraktors'=>$kontraktors]);
    }

    public function delete($id)
    {
        
        if(DB::table('proses')->where('id', intval($id))->delete()){
            return redirect('process');
        }else{
            echo intval($id);
            exit;
        }
        
    }
    public function update(Request $request)
    {

          $id = $request->input('id');
          $user_id = $request->input('nama_user');
          $kontraktor_id = $request->input('nama_kontraktor');
          $status = $request->input('status');


            $affected = DB::table('proses')
                ->where('id', $id)
                ->update(
                    [
                        'user_id' => $user_id,
                        'kontraktor_id' => $kontraktor_id,
                        'status' => $status,
                    ]
            );
            return redirect('process');

    }


    public function add(Request $request)
    {
            $user_id = $request->input('user_id');
            $kontraktor_id = $request->input('kontraktor_id');
            $status = $request->input('status');


            
            

            $id =  DB::table('proses')->insert([
                [
                    'user_id' => $user_id,
                    'kontraktor_id' => $kontraktor_id,
                    'status' => $status,
                ]
            ]);

            return redirect('process');
    }
}