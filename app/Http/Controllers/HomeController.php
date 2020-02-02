<?php

namespace App\Http\Controllers;

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
        return view("pages.general.Project",compact("project"));
    }
}
