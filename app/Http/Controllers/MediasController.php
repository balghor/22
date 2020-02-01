<?php

namespace App\Http\Controllers;

use App\medias;
use Illuminate\Http\Request;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $medias = new medias();
        if ($request->has("find")){
            $files = $medias->where("description","LIKE","%".$request->input("find")."%")->orderByDesc("id")->paginate(30);
        }else{
            $files = $medias->orderByDesc("id")->paginate(30);
        }
        return view("pages.managemedia",compact("files"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("pages.addmedia");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set php.ini
        //upload_max_filesize = 200M
        //max_file_upload = 20
        //post_max_size = 200M
        //memory_limit = 320M
        if ($request->hasFile('file')) {
            $images = array();
            if ($files = $request->file('file')) {
                $project_id=0;
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $mime = $file->getMimeType();
                    $description = $request->description;
                    $path = strip_tags(time()."_".rand(0,9000).$file->getClientOriginalName());
                    $size = $file->getSize();
                    $user_id = session("UserData")->id;
                    $images[]=$path;
                    $file->move('uploads', $path);
                    $media = new medias();
                    $media->filename = $name;
                    $media->extension = $extension;
                    $media->mime = $mime;
                    $media->description = $description;
                    $media->path = $path;
                    $media->size = $size;
                    $media->project_id = $project_id;
                    $media->user_id = $user_id;
                    $media->save();
                }
                return redirect()->route("media.create")->with("state","فایل ها بارگزاری شد")->send();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\medias  $medias
     * @return \Illuminate\Http\Response
     */
    public function show(medias $medias)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medias  $medias
     * @return \Illuminate\Http\Response
     */
    public function edit(medias $medias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medias  $medias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medias $medias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medias  $medias
     * @return \Illuminate\Http\Response
     */
    public function destroy(medias $medias)
    {
        //
    }
}
