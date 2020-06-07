<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::paginate(20);
        return view("pages.managegroup",compact("category"));
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
        if(!empty($request->group_name) && !empty($request->ordered)){
            $category = new Category();
            $category->name = $request->group_name;
            $category->ordered = $request->ordered;
            $category->save();
            redirect()->back()->with("state","گروه جدید با موفقیت ثبت شد")->send();

        }else{
            redirect()->back()->with("state","اطلاعات خواسته شده را وارد نمایید")->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session("UserData")->type=="Manager" || session("UserData")->type=="ProjectUser") {
            $categories = Category::findOrFail($id);
            $category = Category::paginate(20);
            return view("pages.editgroup",["category"=>$category,"categories"=>$categories,"id"=>$id]);
        }else{
            return redirect()->route("dashboard");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (!empty($request->group_name) && !empty($request->ordered) && $request->id>0){
            $categories = Category::findOrFail($request->id);
            $categories->name = $request->group_name;
            $categories->ordered = $request->ordered;
            $categories->save();
            return  redirect()->route("category.index")->with("state","اطلاعات مورد نظر با موفقیت ویرایش شد")->send();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(session("UserData")->type=="Manager" || session("UserData")->type=="ProjectUser") {
            Category::destroy($id);
        return  redirect()->back()->with("state","اطلاعات مورد نظر با موفقیت حذف شد")->send();
        }else{
            return redirect()->route("dashboard");
        }
    }
}
