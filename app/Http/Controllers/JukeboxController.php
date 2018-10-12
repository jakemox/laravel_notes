<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class JukeboxController extends Controller
{
   public function create()
   {
        $song  = new \stdClass();
        $song->id = null;
        $song->name_of_song = null;
        $song->code_of_video = null;

        $form = view('jukebox/form', ['songs' => [$song]]);
        return $form;
   } 


   public function store(Request $request) 
   {
        if($request->input('id')) {
            $id = $request->input('id');
            $query = "
                SELECT *
                FROM `jukebox`
                WHERE `id` = ?
            ";
            $song = DB::select($query, [$id]);
            
        
        } else  {

            $song  = new \stdClass();
            $song->id = null;
            $song->name_of_song = null;
            $song->code_of_video = null;

            $query = "
            INSERT
            INTO `jukebox`
            (`name_of_song`, `code_of_video`)
            VALUES 
            ('{$request->input('name_of_song')}', '{$request->input('code_of_video')}')
             ";

            DB::insert($query);

    
            $form = view('jukebox/form', ['songs' => [$song]]);
            return $form;
            
        }  
   }

   public function edit(Request $request)
   {
        $id = $request->input('id');
        $query = "
            SELECT *
            FROM `jukebox`
            WHERE `id` = ?
            LIMIT 1
        ";

        $songs = DB::select($query, [$id]);
        $form = view('jukebox/form', ['songs' => $songs]);

        return view('jukebox/html_wrapper', ['content' => $form]);
   }

}
