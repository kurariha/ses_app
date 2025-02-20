<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Gemini\Laravel\Facades\Gemini;

class AdminProjectController extends Controller
{
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
        $projects = $query->latest()->paginate(8);

        return view('admin.projects.index', ['projects' => $projects, 'keyword' => $keyword]);
    }
    
    public function create()
    {
        return view('admin.projects.create');
    }
}
