<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExperienceKontraktorController extends Controller
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
        $experience_kontraktors = DB::table('experience_kontraktor')->join('kontraktor', 'experience_kontraktor.kontraktor_id', '=', 'kontraktor.id')->select('experience_kontraktor.*', 'kontraktor.nama_kontraktor')->get();
        return view('experience_kontraktor', ['experience_kontraktors' => $experience_kontraktors, 'kontraktors'=>$kontraktors]);
    }

    public function delete($id)
    {
        if(DB::table('experience_kontraktor')->where('id', intval($id))->delete()){
            return redirect('experience-contractor');
        }else{
            echo intval($id);
            exit;
        }
    }
    public function update(Request $request)
    {


          $id = $request->input('id');
          $kontraktor_id = $request->input('kontraktor_id');
          $experience = $request->input('experience');
          $start_date = $request->input('start_date');
          $finish_date = $request->input('finish_date');

          $extension = $request->file('experience')->extension();
        //   $nama_file = $id.
          $request->file('avatar')->store('upload/');

            $affected = DB::table('experience_kontraktor')
                ->where('id', $id)
                ->update(
                    [
                        'kontraktor_id' => $kontraktor_id,
                        'experience' => $experience,
                        'start_date' => $start_date,
                        'finish_date' => $finish_date,
                    ]
            );
        return redirect('experience-contractor');
    }

    public function add(Request $request)
    {

        if($request->hasFile('experience')){
            $kontraktor_id = $request->input('kontraktor_id');
            $experience = $request->input('experience');
            $start_date = $request->input('start_date');
            $finish_date = $request->input('finish_date');;


            $id = DB::table('experience_kontraktor')->insert([
                [
                    'kontraktor_id' => $kontraktor_id,
                    'start_date' => $start_date,
                    'finish_date' => $finish_date,
                ]
            ]);

            $id = DB::getPdo()->lastInsertId();
            $extension = $request->file('experience')->extension();

            $request->file('experience')->move('upload/experience',$id.'.'.$extension);

            
            DB::table('experience_kontraktor')
                ->where('id', $id)
                ->update(
                    [
                        'experience' => $id.'.'.$extension,
                    ]
            );

            return redirect('experience-contractor');
        }
    
    }
}