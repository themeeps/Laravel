<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $kontraktors = DB::table('kontraktor')->get();
        return view('kontraktor', ['kontraktors' => $kontraktors]);
    }

    public function delete($id)
    {
        DB::table('kontraktor')->where('id', $id)->delete();
        return redirect('contractor');
    }
    public function update(Request $request)
    {


          $id = $request->input('id');
          $username = $request->input('username');
          $password = $request->input('password');
          $nama_kontraktor = $request->input('nama_kontraktor');
          $gender = $request->input('gender');
          $phone = $request->input('phone');
          $email = $request->input('email');
          $domisili = $request->input('domisili');
          $tempat_lahir = $request->input('tempat_lahir');
          $tanggal_lahir = $request->input('tanggal_lahir');
          $alamat = $request->input('alamat');

        $affected = DB::table('kontraktor')
              ->where('id', $id)
              ->update(
                [
                    'username' => $username,
                    'password' => $password,
                    'nama_kontraktor' => $nama_kontraktor,
                    'gender' => $gender,
                    'phone' => $phone,
                    'email' => $email,
                    'domisili' => $domisili,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'alamat' => $alamat
                ]
        );
        return redirect('contractor');
    }

    public function add(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $nama_kontraktor = $request->input('nama_kontraktor');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $domisili = $request->input('domisili');
        $tempat_lahir = $request->input('tempat_lahir');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');;

        DB::table('kontraktor')->insert([
            [
                'username' => $username,
                'password' => $password,
                'nama_kontraktor' => $nama_kontraktor,
                'gender' => $gender,
                'phone' => $phone,
                'email' => $email,
                'domisili' => $domisili,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat
            ]
        ]);
        return redirect('contractor');
    }
}