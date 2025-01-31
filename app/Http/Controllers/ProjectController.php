<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔍 キーワードを取得
        $keyword = $request->input('keyword');
        $query = Project::query();
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('project_name', 'LIKE', "%{$keyword}%")
                    ->orWhere('job_description', 'LIKE', "%{$keyword}%")
                    ->orWhere('required_tech_stack_1', 'LIKE', "%{$keyword}%")
                    ->orWhere('required_tech_stack_2', 'LIKE', "%{$keyword}%")
                    ->orWhere('work_location', 'LIKE', "%{$keyword}%");
            });
        }
        $projects = $query->paginate(10);

        $projects = Project::latest()->paginate(6);

        return view('projects.index', ['projects' => $projects, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
