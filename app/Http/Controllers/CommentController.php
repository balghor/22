<?php

namespace App\Http\Controllers;

use App\Comment;
use App\projects;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderByDesc('id')->paginate(20);

        return view("pages.managecomment",compact("comments"));
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
        //
        if (!empty($request->fullname) && !empty($request->pid) && !empty($request->context)){
            $comment = new Comment();
            $comment->fullname = $request->fullname;
            $comment->pid = $request->pid;
            $comment->context = $request->context;
            $comment->save();
            redirect()->back()->with("StateOK","نظر شما ثبت و پس از بررسی نمایش داده خواهد شد")->send();

        }else{
            redirect()->back()->with("StateError","اطلاعات خواسته شده را وارد نمایید")->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session("UserData")->type=="Manager" || session("UserData")->type=="ProjectUser") {

            $comment = Comment::findOrFail($id);
            $ProjectName= projects::find($comment->pid);
            return view("pages.editcomment",["comment"=>$comment,"ProjectName"=>$ProjectName->project_name]);
        }else{
            return redirect()->route("dashboard");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        if (!empty($request->pid) && !empty($request->parents) && !empty($request->reply)){
            $comment_new_modir = new Comment();
            \DB::table("comments")->where("id",$request->parents)->update(["active"=>1]);
            $comment_new_modir->fullname= "مدیر سایت";
            $comment_new_modir->context = $request->reply;
            $comment_new_modir->pid = $request->pid;
            $comment_new_modir->active = 1;
            $comment_new_modir->parents = $request->parents;
            $comment_new_modir->save();
            return redirect()->route("comment.index")->with("state","اطلاعات با موفقیت ویرایش شد")->send();

        }else{
            return redirect()->route("comment.index")->with("state","مشکلی در ثبت اطلاعات به وجود آمده است")->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(session("UserData")->type=="Manager" || session("UserData")->type=="ProjectUser") {

            Comment::destroy($id);
            return  redirect()->back()->with("state","اطلاعات مورد نظر با موفقیت حذف شد")->send();
        }else{
            return redirect()->route("dashboard");
        }
    }

    public  function  AgreeComment($id){
        \DB::table("comments")->where("id",$id)->update(["active"=>1]);
        redirect()->back()->with("state","اطلاعات با موفقیت تغییر یافت")->send();
    }
}
