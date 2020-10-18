<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
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
         return view('user', ['users' => $users]);
    }

    public function delete($id)
    {
        DB::table('user')->where('id', $id)->delete();
        return redirect('user');
    }

    public function update(Request $request)
    {


          $id = $request->input('id');
          $username = $request->input('username');
          $password = $request->input('password');
          $nama_user = $request->input('nama_user');
          $gender = $request->input('gender');
          $phone = $request->input('phone');
          $email = $request->input('email');
          $domisili = $request->input('domisili');
          $tempat_lahir = $request->input('tempat_lahir');
          $tanggal_lahir = $request->input('tanggal_lahir');
          $alamat = $request->input('alamat');

        $affected = DB::table('user')
              ->where('id', $id)
              ->update(
                [
                    'username' => $username,
                    'password' => $password,
                    'nama_user' => $nama_user,
                    'gender' => $gender,
                    'phone' => $phone,
                    'email' => $email,
                    'domisili' => $domisili,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'alamat' => $alamat
                ]
        );
        return redirect('user');
    }

    public function add(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $nama_user = $request->input('nama_user');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $domisili = $request->input('domisili');
        $tempat_lahir = $request->input('tempat_lahir');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');;

        DB::table('user')->insert([
            [
                'username' => $username,
                'password' => $password,
                'nama_user' => $nama_user,
                'gender' => $gender,
                'phone' => $phone,
                'email' => $email,
                'domisili' => $domisili,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat
            ]
        ]);
        return redirect('user');
    }
}