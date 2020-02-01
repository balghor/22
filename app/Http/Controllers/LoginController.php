<?php

namespace App\Http\Controllers;

use App\projects;
use App\users;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function ShowLogin(){
        return view("pages.general.login");
    }

    public function DoLogin(Request $request)
    {
        if (!empty($request->username) && !empty($request->password)) {
            $User = users::where("username", "=", $request->post('username'))->whereIn("type",["Manager","ProjectUser"])->first();
            if (!is_null($User)) {
                if (\Hash::check($request->post("password"), $User->password)) {
                    session()->put('UserData', $User);
                    return redirect()->route("dashboard")->send();
                } else {
                    return redirect()->route("show_login")->with("error","نام کاربری یا کلمه عیور اشتباه است")->send();
                }
            }else{
                return redirect()->route("show_login")->with("error","نام کاربری یا کلمه عیور اشتباه است")->send();
            }
        }
    }
    public function changePassowrdShow(){
        return view("pages.changepassword");
    }
    public function changePassowrd(Request $request){
        if ($request->password==$request->repassword){
            $User = users::findOrFail(session("UserData")->id);
            $User->password = \Hash::make($request->password);
            $User->update();
            return redirect()->route("change_password_show")->with("state","تغییرات با موفقیت انجام شد")->send();

        }else{
            return redirect()->route("change_password_show")->with("state","کلمه عبور یکسان نیست")->send();

        }
    }


    public function ShowDashboard(){
        $countUser = users::count();
        $countProject = projects::count();

        $data = array("userCount"=>$countUser,"projectsCount"=>$countProject);
        return view("pages.dashboard",compact("data"));
    }
    public function logout(){
        session()->remove("UserData");
        session()->flush();
        return redirect()->route("show_login")->with("state","شما از سامانه خارج شدید")->send();

    }
}
