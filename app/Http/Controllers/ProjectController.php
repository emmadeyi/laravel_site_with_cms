<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Project;
use Illuminate\Http\Request;
use Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = Equipment::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.projects.create', compact('equipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'details' => 'required',
            'title' => 'required|unique:projects',
        ],
        [
            'title.required' => 'Enter title',
            'title.unique' => 'Project with same title already exist',
            'details.required' => 'Enter project details',
        ]);
        $fileName = time().'.'.$request->thumbnail->extension();  
        $thumbnail = $request->file('thumbnail')->storeAs(
            'projects', $fileName, 'public'
        );
        $project = new Project();
        $project->thumbnail = $thumbnail;
        $project->title = $request->title;
        $project->sub_title = $request->sub_title;
        $project->details = $request->details;
        $project->slug = \str_slug($request->title);
        $project->is_published = $request->is_published;
        $project->user_id = auth()->user()->id;
        $project->post_type = 'post';
        if($project->save()){
            $project->equipments()->sync($request->fleet_id, false);
            $message = 'Project added successfully';
            return redirect()->route('projects.index')->with('success-message', $message);
        }
        $message = 'Error adding Project';
        return redirect()->back()->with('error-message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $project = Project::find($project);
        if($project){
            $equipment = Equipment::orderBy('name', 'ASC')->pluck('name', 'id');
            return view('admin.projects.create', compact('equipment'));
        }
        return redirect()->back()->with('error-message', 'Error fetch request data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = Project::find($project);
        if($project){
            $equipment = Equipment::orderBy('name', 'ASC')->pluck('name', 'id');
            return view('admin.projects.edit', compact('equipment', 'project'));
        }
        return redirect()->back()->with('error-message', 'Error fetch request data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project)
    {
        $this->validate($request, [
            'thumbnail' => 'file|mimes:jpg,jpeg,png|max:2048',
            'details' => 'required',
            'title' => 'required|unique:projects,title,'.$project .',id', //ignore this id
        ],
        [
            'title.required' => 'Enter title',
            'title.unique' => 'Project with same title already exist',
            'details.required' => 'Enter project details',
        ]);
                
        $project = Project::find($project);
        $filePath = $project->thumbnail;
        if($request->has('thumbnail')){
            $fileName = time().'.'.$request->thumbnail->extension();  
            $filePath = $request->file('thumbnail')->storeAs(
                'project', $fileName, 'public'
            );      
            Storage::disk('public')->delete($project->thumbnail);
        }
        $project->thumbnail = $filePath;
        $project->title = $request->title;
        $project->sub_title = $request->sub_title;
        $project->details = $request->details;
        $project->slug = \str_slug($request->title);
        $project->is_published = $request->is_published;
        $project->user_id = auth()->user()->id;
        $project->post_type = 'post';
        if($project->save()){
            if($request->has('fleet_id')) $project->equipments()->sync($request->fleet_id);
            $message = 'Project updated successfully';
            return redirect()->route('projects.index')->with('success-message', $message);
        }
        $message = 'Error updating Project';
        return redirect()->back()->with('error-message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = Project::find($project);
        
        if($project->delete()) {            
            if($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            return redirect()->route('projects.index')->with('success-message', 'Project record deleted');
        }
        else return redirect()->back()->with('error-message', 'Error deleting Project record');
    }
}
