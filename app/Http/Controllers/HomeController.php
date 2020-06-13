<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Comment;
use App\projects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function HomeIndex(Request $request){
        if ($request->search!=""){
            $projects = projects::where("active", 1)->where("project_name","LIKE","%".htmlspecialchars(strip_tags($request->get("search")))."%")->orderBy("ordered")->get(['*']);

        }else {
            $projects = projects::where("active", 1)->orderBy("ordered")->get(['*']);
        }
        $Category = Category::orderBy("ordered")->get(['*']);
        return view("pages.general.Home",["projects"=>$projects,"category"=>$Category]);
    }
    public function category($id){
        $projects = projects::where("active",1)->where("category_id",$id)->orderBy("ordered")->get(['*']);
        $Category = Category::orderBy("ordered")->get(['*']);
        return view("pages.general.Home",["projects"=>$projects,"category"=>$Category]);
    }
    public function project($id){
        $project = projects::where("active",1)->findOrFail($id);
        $albums = Album::where("pid",$id)->get();
        $comments = Comment::where("pid",$id)->where("active",1)->get();
        return view("pages.general.Project",["project"=>$project,"comments"=>$comments,"id"=>$id,"albums"=>$albums]);
    }
}
