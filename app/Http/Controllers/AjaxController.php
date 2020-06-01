<?php

namespace App\Http\Controllers;

use App\medias;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\File;

class AjaxController extends Controller
{
    //
    public function LoadProject(Request $request)
    {
        $FileString = file_get_contents("http://172.25.95.3/ceo/index/record/list/project/");
        $List = json_decode($FileString, true);
        foreach ($List as $item => $value) {
            if ($value['ID'] == $request->id) {

                $complex = @json_decode($value['complex']);

                $countcomplx = @count(@$complex->no);
                $psend = array();
                for ($i = 0; $i < $countcomplx; $i++) {
                    $psend[] = str_replace(",", "", $complex->pricesend[$i]);
                }
                $priceagree = array();
                for ($i = 0; $i < $countcomplx; $i++) {
                    $priceagree[] = str_replace(",", "", $complex->priceagree[$i]);
                }


                $pys = @json_decode($value['PhysicalProgress']);

                $countpys = @count(@$pys->date);
                $dates = array();
                for ($i = 0; $i < $countpys; $i++) {
                    $dates[] = $pys->date[$i];
                }
                $real = array();
                for ($i = 0; $i < $countpys; $i++) {
                    $real[] = $pys->real[$i];
                }
                $programe = array();
                for ($i = 0; $i < $countpys; $i++) {
                    $programe[] = $pys->programe[$i];
                }

                $MaliPrecent = round((@max($psend)/$value['TotalPrice'])*100);
                $startdate = new Verta($value["StartProjectDate"]);
                $enddate = new Verta($value["DeadLine"]);
                $Project["ProjectName"] = $value["ProjectName"];
                $Project["StartDate"] = $startdate->format("Y/m/d");
                $Project["EndDate"] = $enddate->format("Y/m/d");
                $Project['Physical']= @max($real);
                $Project['Financial']= $MaliPrecent;
                $Project['finished']= $value['compeleted'];
                $Project['description']= strip_tags($value['information']);
                return response($Project,200);
            }
        }
    }

    public function delete_file(Request $request){
        if(!empty($request->id)){
            $Item = medias::findOrFail($request->id);
            File::delete(("uploads/".$Item->path));
            $Item->delete();
        }
    }
}
