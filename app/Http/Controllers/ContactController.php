<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ログインユーザーの申し込み済みプロジェクトを取得
        $contacts = Contact::where('user_id', Auth::id())->with('project')->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $user =auth()->user();
        return view('contacts.create', ['project' => $project, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request, Project $project)
    {
        $contact = new Contact($request->all());
        $contact->user_id = $request->user()->id;
        $contact->project_id = $project->id;

        try {
            // 登録
            $project->contacts()->save($contact);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }

        // 登録したら案件に戻る
        return redirect()
            ->route('projects.show', $project)
            ->with('notice', 'お申込が完了しました。担当者からの連絡をお待ち下さい。<a href="' . route('projects.contacts.index', $project) . '" class="underline">申込み一覧を見る<i class="fa-solid fa-up-right-from-square"></i></a>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
