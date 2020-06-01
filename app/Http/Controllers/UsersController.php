<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = users::orderByDesc('id')->paginate(20);

        return view("pages.manageuser",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("pages.adduser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->has('full_name') &&
            $request->has('username') &&
            $request->has('password') &&
            $request->has('type') &&
            $request->has('active')) {
            $users = new users();
            $existusers = users::where("username","=",$request->input('username'))->count();
            if ($existusers == 0) {
                $users->full_name = $request->input('full_name');
                $users->username = $request->input('username');
                $users->password = \Hash::make($request->input('password'));
                $users->type = $request->input('type');
                $users->active = $request->input('active');
                $users->access_project = "";
                $users->save();
                return redirect()->route("user.create")->with("state","کاربر با موفقیت اضافه شد")->send();
            }else{
                return redirect()->back()->with("state","کاربر انتخاب شده قبل در لیست وجود دارد")->send();
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = users::findOrFail($id);
        return view("pages.edituser",compact("users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
        //
        if ($request->has('full_name') &&
            $request->has('type') &&
            $request->has('active')) {
                $arrayList = [
                    "full_name" => $request->input('full_name'),
                    'type' => $request->input('type'),
                    'active' => $request->input('active'),
                    'access_project' => ""
                ];
                if(!empty($request->input('password'))){
                    $arrayList["password"] = \Hash::make($request->input('password'));
                }
                \DB::table("users")->where("id","=",$request->input("id"))->update($arrayList);

                return redirect()->route("user.index")->with("state","تغییرات با موفقیت ثبت شد")->send();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        users::destroy($id);
        return  redirect()->back()->with("state","اطلاعات مورد نظر با موفقیت حذف شد")->send();
    }
}
