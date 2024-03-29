<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $rules = [
        'type_id' => ['required'],
        'title' => ['required', 'min:3', 'string', 'max:40'],
        'author' => ['required', 'min:3', 'string', 'max:40'],
        'project_image' => ['url:https', 'required'],
        'content' => ['min:20', 'required'],
        'date' => ['date', 'required'],
        'technologies' => ['exists:technologies,id'],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create new Project';
        $project = new Project();
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('project', 'pageTitle', 'technologies', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules);
        // dd($data);
        $project = Project::create($data);
        if (isset($data['technologies'])) $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $types = Type::all();


        return view('admin.projects.edit', compact('project', 'technologies', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate($this->rules);
        $project->update($data);
        $project->technologies()->sync(isset($data['technologies']) ? $data['technologies'] : []);

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function deletedIndex()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function deletedShow(string $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        return view('admin.projects.deleted-show', compact('project'));
    }

    public function deletedRestore(string $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->restore();

        return redirect()->route('admin.projects.index');
    }

    public function deletedDestroy(string $id)
    {
        $project = Project::withTrashed()->where('id', $id)->first();
        $project->forceDelete();

        return redirect()->route('admin.projects.deleted.index');
    }
}