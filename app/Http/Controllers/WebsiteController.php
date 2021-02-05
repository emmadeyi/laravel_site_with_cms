<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Project;
use Response;

class WebsiteController extends Controller
{
    public function index(){
        $equipments = Equipment::orderBy('name', 'ASC')->where('is_published', '1')->get();
        $projects = Project::orderBy('id', 'ASC')->where('post_type', 'post')->where('is_published', '1')->paginate(5);
        $projectCount = Project::orderBy('id', 'ASC')->where('post_type', 'post')->where('is_published', '1')->count();
        return view('website.index', compact('equipments', 'projects', 'projectCount'));
    }

    public function about(){
        return view('website.about');
    }

    public function services(){
        return view('website.services');
    }

    public function service_details($slug){
        return view('website.service_details');
    }

    public function equipment(){
        $equipments = Equipment::orderBy('id', 'ASC')->where('is_published', '1')->paginate(5);
        $equipmentCount = Equipment::orderBy('id', 'ASC')->where('is_published', '1')->count();
        if($equipmentCount > 0) return view('website.equipment', compact('equipments', 'equipmentCount'));
        else return Response::view('website.error.404', array(), 404);
    }

    public function projects(){
        $projects = Project::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->paginate(6);
        $projectCount = Project::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->count();
        if($projectCount > 0) return view('website.projects', compact('projects', 'projectCount'));
        else return Response::view('website.error.404', array(), 404);
    }

    public function projectDetails($slug){
        $project = Project::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();
        $projects = Project::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->limit(5)->get();
        $equipmentList = Equipment::orderBy('id', 'ASC')->where('is_published', '1')->get();
        if($project){
            return view('website.project', compact('project', 'projects', 'equipmentList'));
        } 
        else {
            return Response::view('website.error.404', array(), 404);
        }
    }
    public function equipmentDetails($slug){
        $equipment = Equipment::where('slug', $slug)->where('is_published', '1')->first();
        $projects = Project::orderBy('id', 'DESC')->where('post_type', 'post')->where('is_published', '1')->limit(5)->get();
        $equipmentList = Equipment::orderBy('id', 'ASC')->where('is_published', '1')->get();
        if($equipment){
            $equipment_projects = $equipment->projects()->orderBy('projects.id', 'DESC')->where('is_published', '1')->limit(5)->get();
            return view('website.equipment_details', compact('equipment', 'equipment_projects', 'projects', 'equipmentList'));
        } 
        else {
            return Response::view('website.error.404', array(), 404);
        }
    }
}
