<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Storage;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::orderBy('id', 'DESC')->get();
        return view('admin.fleets.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('admin.fleets.create');
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
            'name' => 'required|unique:equipment',
        ],
        [
            'thumbnail.required' => 'Enter thumbnail url',
            'name.required' => 'Enter name',
            'name.unique' => 'Fleet Item with same name already exist',
        ]);
        $fileName = time().'.'.$request->thumbnail->extension();  
        $thumbnail = $request->file('thumbnail')->storeAs(
            'projects', $fileName, 'public'
        );
        $equipment = new Equipment();
        $equipment->thumbnail = $thumbnail;
        $equipment->name = $request->name;
        $equipment->description = $request->description;
        $equipment->slug = \str_slug($request->name);
        $equipment->is_published = $request->is_published;
        $equipment->user_id = auth()->user()->id;
        if($equipment->save()){
            $message = 'Fleet Item added successfully';
            return redirect()->route('fleets.index')->with('success-message', $message);
        }
        $message = 'Error adding Fleet Item';
        return redirect()->back()->with('error-message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit($equipment)
    {
        $equipment = Equipment::find($equipment);
        if($equipment) return view('admin.fleets.edit', compact('equipment'));
        else return redirect()->back()->with('error-message', 'Error fetch request data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $equipment)
    {
        $this->validate($request, [
            'thumbnail' => 'file|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|unique:equipment,name,'.$equipment,
        ],
        [
            'name.required' => 'Enter name',
            'name.unique' => 'Fleet Item with same name already exist',
        ]);

        $equipment = Equipment::find($equipment);
        $filePath = $equipment->thumbnail;
        if($request->has('thumbnail')){
            $fileName = time().'.'.$request->thumbnail->extension();  
            $filePath = $request->file('thumbnail')->storeAs(
                'fleets', $fileName, 'public'
            );      
            Storage::disk('public')->delete($equipment->thumbnail);
        }
        $equipment->thumbnail = $filePath;
        $equipment->thumbnail = $thumbnail;
        $equipment->name = $request->name;
        $equipment->description = $request->description;
        $equipment->slug = \str_slug($request->name);
        $equipment->is_published = $request->is_published;
        $equipment->user_id = auth()->user()->id;
        if($equipment->save()){
            $message = 'Fleet Item updated successfully';
            return redirect()->back()->with('success-message', $message);
        }
        $message = 'Error updating Fleet Item';
        return redirect()->back()->with('error-message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($equipment)
    {
        $equipment = Equipment::find($equipment);
        if($equipment->delete()) {                  
            if($equipment->thumbnail) Storage::disk('public')->delete($equipment->thumbnail);
            return redirect()->route('fleets.index')->with('success-message', 'Fleet item deleted');
        }
        else return redirect()->back()->with('error-message', 'Error deleting Fleet Item');
    }
}
