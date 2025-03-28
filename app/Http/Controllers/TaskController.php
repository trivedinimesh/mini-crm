<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Client;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Gate;
use App\PermissionEnum;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['user', 'project', 'client'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $projects = Project::select(['id', 'title'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        return view('tasks.create', compact('users', 'projects', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('message', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load('user', 'project', 'client');
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $projects = Project::select(['id', 'title'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        return view('tasks.edit', compact('users', 'projects', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('message', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize(PermissionEnum::DELETE_TASKS->value);
        $task->delete();
        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully');
    }
}
