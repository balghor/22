<?php

namespace App\Http\Controllers;

use App\medias;
use App\projects;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class AlbumModifyController extends Controller
{
    //
    public  function album_page(Request $request){
        if ($request->has("id")){
            $item = \DB::table("projects")->where("id","=",$request->id)->first();
                return view("pages.add2album",compact("item"));
        }
    }

    public function add2album(Request $request, projects $projects)
    {
        if ($request->hasFile('album')) {
            $images = array();
            if ($files = $request->file('album')) {
                $project_id=0;
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $mime = $file->getMimeType();
                    $description = $request->description;
                    $path = strip_tags(time()."_".rand(0,9000).$file->getClientOriginalName());
                    $size = $file->getSize();
                    $project_id = $request->pid;
                    $user_id = "0";
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
                \DB::table("projects")->where("id","=",$project_id)->update(["album"=>\Psy\Util\Json::encode($images)]);
                return redirect(route("add2album")."?id=".$project_id)->with("images",$images)->send();
            }
        }
    }
}
