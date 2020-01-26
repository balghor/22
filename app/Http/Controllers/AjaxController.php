<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function LoadProject(Request $request){
        $FileString = file_get_contents("http://cp.sazmanomran.org/ceo/index/record/list/project/");
        $List = json_decode($FileString,true);
        foreach ($List as  $item => $value){
            if ($value['ID'] == $request->id){
                $Project["ProjectName"] = $value["ProjectName"];
                $Project["ProjectName"] = $value["ProjectName"];
                $Project["ProjectName"] = $value["ProjectName"];
            }
        }
    }
}
