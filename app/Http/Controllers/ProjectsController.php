<?php

namespace App\Http\Controllers;

use App\projects;
use Illuminate\Http\Request;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = projects::orderByDesc('id')->paginate(20);

        return view("pages.manageproject",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            return view("pages.addproject");
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
        if ($request->has('project_name') &&
            $request->has('start_date') &&
            $request->has('end_date') &&
            $request->has('physical_progress') &&
            $request->has('cost') &&
            $request->has('active_state')) {
            $project = new projects();
            $existProject = projects::where("cp_id","=",$request->input('cp_id'))->count();
            if ($existProject == 0) {
                $project->project_name = $request->input('project_name');
                $project->start_date = $request->input('start_date');
                $project->end_date = $request->input('end_date');
                $project->physical_progress = $request->input('physical_progress');
                $project->cost = $request->input('cost');
                $project->active = $request->input('active_state');
                $project->description = $request->input('description');
                $project->detail = $request->input('detail');
                $project->cp_id = $request->input('cp_id');
                $project->album = " ";
                $project->user_id = session("UserData")->id;
                $project->save();
                return redirect()->route("project.create")->with("state","پروژه با موفقیت ثبت شد")->send();
            }else{
                return redirect()->back()->with("state","پروژه انتخاب شده قبل در لیست وجود دارد")->send();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
           $projects = projects::findOrFail($id);
        return view("pages.editproject",compact("projects"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects)
    {
        //
        if ($request->has('start_date') &&
            $request->has('end_date') &&
            $request->has('physical_progress') &&
            $request->has('cost') &&
            $request->has('active_state')) {
            \DB::table("projects")->where("id","=",$request->id)->update([
            "start_date" => $request->input('start_date'),
            "end_date" => $request->input('end_date'),
            "physical_progress" => $request->input('physical_progress'),
            "cost" => $request->input('cost'),
            "active" => $request->input('active_state'),
            "description" => $request->input('description'),
            "detail" => $request->input('detail')]);
            return redirect()->route("project.index")->with("state","پروژه با موفقیت ویرایش شد")->send();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        projects::destroy($id);
        return  redirect()->back()->with("state","اطلاعات مورد نظر با موفقیت حذف شد")->send();
    }

}
