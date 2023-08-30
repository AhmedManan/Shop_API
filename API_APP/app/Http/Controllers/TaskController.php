<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\TaskModel;
use App\Traits\HTTPResponses;
use GuzzleHttp\Promise\TaskQueue;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use HTTPResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(
            TaskModel::where('user_id', Auth::user()->id)->get()
        );
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
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();
        $task= TaskModel::create([
            'user_id'=>Auth::user()->id,
            'name'=>request()->name,
            'description'=>request()->description,
            'priority'=>request()->priority
        ]);
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskModel $task)
    {
        // tarnary operator: if not outhorize show the not_authorized function else show the task
        return $this->is_not_authorized($task) ? $this->is_not_authorized($task) : new TaskResource($task);
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
    public function update(Request $request, TaskModel $task)
    {
        $task->update($request->all());
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskModel $task)
    {
        $task->delete();

        return response(null, 204);
    }
    private function is_not_authorized($task){
        if(Auth::user()->id != $task->user_id){
            return $this->error("", 'you are not authorized for this request', 403);
        }
    }
}
