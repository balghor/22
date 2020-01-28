<?php

namespace App\Http\Controllers;

use App\projects;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
            $request->has('active_state')){
            $project = new projects();
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
            $project->user_id = "0";
            $project->save();
            return redirect()->route("project.create")->send();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }

}
