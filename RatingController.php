<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RatingController extends Controller
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
        $ratings = DB::table('rating')
        ->join('proses', 'rating.proses_id', '=', 'proses.id')
        ->select('rating.*', 'proses.status')->get();
        return view('rating', ['ratings' => $ratings, 'prosess'=>$prosess]);
    }

    public function delete($id)
    {
        
        if(DB::table('rating')->where('id', intval($id))->delete()){
            return redirect('rated');
        }else{
            echo intval($id);
            exit;
        }
        
    }
    public function update(Request $request)
    {

          $id = $request->input('id');
          $proses_id = $request->input('proses_id');
          $score = $request->input('score');


            $affected = DB::table('rating')
                ->where('id', $id)
                ->update(
                    [
                        'proses_id' => $proses_id,
                        'score' => $score,
                    ]
            );
            return redirect('rated');

    }


    public function add(Request $request)
    {
            $proses_id = $request->input('proses_id');
            $score = $request->input('score');


            
            

            $id =  DB::table('rating')->insert([
                [
                    'proses_id' => $proses_id,
                    'score' => $score,
                ]
            ]);

            return redirect('rated');
    }
}