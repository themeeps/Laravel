<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AchievementKontraktorController extends Controller
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
        $achievement_kontraktors = DB::table('achievement_kontraktor')->join('kontraktor', 'achievement_kontraktor.kontraktor_id', '=', 'kontraktor.id')->select('achievement_kontraktor.*', 'kontraktor.nama_kontraktor')->get();
        return view('achievement_kontraktor', ['achievement_kontraktors' => $achievement_kontraktors, 'kontraktors'=>$kontraktors]);
    }

    public function delete($id)
    {
        
        if(DB::table('achievement_kontraktor')->where('id', intval($id))->delete()){
            return redirect('achievement-contractor');
        }else{
            echo intval($id);
            exit;
        }
        
    }
    public function update(Request $request)
    {

        if($request->hasFile('achievement')){
            
            
          $id = $request->input('id');
          $kontraktor_id = $request->input('kontraktor_id');
          $achievement = $request->input('achievement');
          $date = $request->input('date');

          $extension = $request->file('achievement')->extension();
        //   $nama_file = $id.
          $request->file('avatar')->store('upload/');

            $affected = DB::table('achievement_kontraktor')
                ->where('id', $id)
                ->update(
                    [
                        'kontraktor_id' => $kontraktor_id,
                        'achievement' => $achievement,
                        'date' => $date,
                    ]
            );
            return redirect('achievement-contractor');

         }

    }

    public function add(Request $request)
    {

        

        if($request->hasFile('achievement')){
            $kontraktor_id = $request->input('kontraktor_id');
            $achievement = $request->input('achievement');
            $date = $request->input('date');


            
            

            $id = DB::table('achievement_kontraktor')->insert([
                [
                    'kontraktor_id' => $kontraktor_id,
                    'date' => $date,
                ]
            ]);

            $id = DB::getPdo()->lastInsertId();
            $extension = $request->file('achievement')->extension();

            $request->file('achievement')->move('upload/achievement',$id.'.'.$extension);

            
            DB::table('achievement_kontraktor')
                ->where('id', $id)
                ->update(
                    [
                        'achievement' => $id.'.'.$extension,
                    ]
            );

            return redirect('achievement-contractor');
        }
    }
}