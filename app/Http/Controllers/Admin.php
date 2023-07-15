<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostChannels;
use App\Http\Requests\PostMovies;
use App\Models\Chaine;
use App\Models\Video;
use Illuminate\Http\Request;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Chaine::all();
        return view('admin.admin',['chaine'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if(!is_numeric($id)){
            abort(404);
        }
        $chaine = Chaine::find($id);
        
        if($chaine == null){
            abort(404);
        }
        $video = Chaine::find($id)->videos;
        

        return view('admin.video',['chaine'=>$chaine,'video'=>$video]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostChannels $request)
    {
        /**@var UploadedFile $image */

        $image = $request->image;
        $imagePath  = $image->store('thumnails', 'public');
        $res = Chaine::create([
            'name'=>$request->name,
            'image'=>$imagePath,
            'type'=>$request->type,
        ]);

        if($res){
            return back()->with('success', 'Chaine posté');
        }
        return back()->with('fail', 'Chaine error');
    }

      /**
     * post movie
     */

     public function postMovie(PostMovies $request){
        if(!is_numeric($request->chaine_id)){
            abort(403);
        }
        $image = $request->minuature_path;
        $video = $request->video_path;

        $imagePath  = $image->store('thumnails', 'public');
        $videoPath  = $video->store('movies', 'public');

        $res = Video::create([
            'video_path'=>$videoPath,
            'minuature_path'=>$imagePath,
            'type'=>$request->type,
            'titre'=>$request->titre,
            'auteur'=>$request->auteur,
            'description'=>$request->description,
            'chaine_id'=>$request->chaine_id
        ]);

        if($res){
            return back()->with('success','Traitement effectué avec succé !');
        }
        return back()->with('fail','Il y a une erreur lors de la traitement !');
     }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!is_numeric($id)){
            abort(403);
        }

        $video = Video::find($id);
        $like  = Video::find($id)->likes;

        return view('dashbord.show',['video'=>$video,'like'=>$like]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
