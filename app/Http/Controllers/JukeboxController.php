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
//update query

            $query = "
            UPDATE `jukebox`
            SET `name_of_song` = ?,
                `code_of_video` = ?
            WHERE `id` =  ?
            ";

           $id =  $request->input('id'); 

           DB::update($query, [$request->input('name_of_song'), $request->input('code_of_video'), $request->input('id')]);

        } else  {

            $query = "
            INSERT
            INTO `jukebox`
            (`name_of_song`, `code_of_video`)
            VALUES 
            (?, ?)
             ";

            DB::insert($query, [$request->input('name_of_song'), $request->input('code_of_video')]);

            $id = DB::getPdo()->lastInsertId();
        } 

        return redirect('jukebox/edit?id='.$id);
   }

   public function edit(Request $request)
   {
        $id = $request->input('id');
        $query = "
            SELECT *
            FROM `jukebox`
            WHERE `id` = ?
            LIMIT 0, 1
        ";

        $songs = DB::select($query, [$id]);
        $form = view('jukebox/form', ['songs' => $songs]);


        return view('jukebox/html_wrapper', ['content' => $form]);
   }

   public function display() 
   {

    $query = "
    SELECT *
    FROM `jukebox`
    ";

    $songs = DB::select($query);

    $main_view = view('jukebox/display', ['songs' => $songs]);

    // var_dump((array)$songs[0]);
     return view('jukebox/html_wrapper', ['content' => $main_view]);


   }

   public function delete(Request $request)
   {

        $id = $request->input('id');

        $query = "
            DELETE 
            FROM `jukebox`
            WHERE `id` = ?
        ";

        DB::delete($query, [$id]);
 
        return redirect('jukebox/display');
        
   }

   public function user()
   {

    $query = "
    SELECT *
    FROM `jukebox`
    ";

    $songs = DB::select($query);

    $main_view = view('jukebox/user', ['songs' => $songs]);

     return view('jukebox/html_wrapper', ['content' => $main_view]);
   }

}
