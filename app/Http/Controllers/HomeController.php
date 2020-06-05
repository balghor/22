<?php

namespace App\Http\Controllers;

use App\Comment;
use App\projects;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function HomeIndex(){
        $projects = projects::where("active",1)->orderByDesc("id")->get(['*']);
        return view("pages.general.Home",compact("projects"));
    }
    public function project($id){
        $project = projects::where("active",1)->findOrFail($id);
        $comments = Comment::where("pid",$id)->where("active",1)->get();
        return view("pages.general.Project",["project"=>$project,"comments"=>$comments,"id"=>$id]);
    }
}
