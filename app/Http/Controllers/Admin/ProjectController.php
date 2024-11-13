<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technology = Technology::all();
        return view("admin.projects.index", compact("projects","technology"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
      
        return view("admin.projects.create",compact("types","technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            "title"=>"required|max:255|min:3|string|",
            "content"=>"required|max:255|min:3|string|",
            "url"=>"required|url",
            "type_id"=> [ "required", "numeric", "integer", "exists:types,id"],
            "technologies" => ["array", "exists:technologies,id"],
            "image"=> ["nullable","image","max:250"],
        ],[
            "title.required"=>"Il titolo è necessario",
            "content.required"=>"La descrizione è necessaria",
            "url.required"=>"L' URL è  necessario",
            "type_id"=> "Il tipo è obbligatorio",
            "technologies" => "Seleziona almeno una tecnologia",
        ]);
     
        $filePath = Storage::disk("public")->put("img/projects/" , $request->image);
        $data["image"] = $filePath;
      
        $project = Project::create($formdata);
        $project->technologies()->sync($formdata['technologies']);
        return redirect()->route("admin.projects.index",compact("project",));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $types = Type::all();
        $technology = Technology::all();
        $project = Project::findOrFail($id);
        return view("admin.projects.show", compact("project","types","technology"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technologies= Technology::all();
        $types = Type::all();
        $project = Project::findOrFail($id);
        return view("admin.projects.edit", compact("project","types","technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projectData=$request->validate([
            "title"=>"required|max:255|min:3|string|",
            "content"=>"required|max:255|min:3|string|",
            "url"=>"required|url",
            "type_id"=> [ "required", "numeric", "integer", "exists:types,id"],
            "technologies" => ["array", "exists:technologies,id"],
            "image"=> ["nullable","image","max:250"],
        ],[
            "title.required"=>"Il titolo è necessario",
            "content.required"=>"La descrizione è necessaria",
            "url.required"=>"L' URL è  necessario",
            "type_id"=> "Il tipo è obbligatorio",
            "technologies" => "Seleziona almeno una tecnologia",
        ]);
      
        $project = Project::findOrFail($id);
        $project->update($projectData);
        $project->technologies()->sync($projectData['technologies']);
        return redirect()->route("admin.projects.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route("admin.projects.index");
    }

    public function __construct()
    {
        $this->middleware("auth");
    }
}
