<?php

namespace App\Http\Controllers;

use App\Album;
use App\medias;
use App\projects;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $Album = new Album();
        $project = projects::find($id);
        $archive = $Album->where("pid",$id)->get();
        return view("pages.addalbum",["id"=>$id, "archive"=>$archive,"project_name"=>$project->project_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                    $archive = new Album();
                    //add media
                    $media->filename = $name;
                    $media->extension = $extension;
                    $media->mime = $mime;
                    $media->description = $description;
                    $media->path = $path;
                    $media->size = $size;
                    $media->project_id = $project_id;
                    $media->user_id = $user_id;
                    $media->save();
                    //add album
                    $archive->title = $description;
                    $archive->pid = $request->pid;
                    $archive->path = $path;
                    $archive->save();
            }
            return redirect()->route("album.index",["id"=>$request->pid])->with("state","آلبوم جدید اضافه شد")->send();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Album::destroy($id);
        redirect()->back()->with("state","آلبوم با موفقیت حذف گردید")->send();
    }
}
