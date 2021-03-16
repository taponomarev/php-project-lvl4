<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id')
            ])
            ->get();
        session()->put('filter', \request()->input('filter'));
        $taskStatuses = TaskStatus::all()
            ->pluck('name', 'id')
            ->toArray();
        $users = User::all()
            ->pluck('name', 'id')
            ->toArray();
        return view('tasks.index', compact('tasks', 'taskStatuses', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        $taskStatuses = TaskStatus::all()
            ->pluck('name', 'id')
            ->toArray();
        $performers = User::all()
            ->pluck('name', 'id')
            ->toArray();
        $labels = Label::all()
            ->pluck('name', 'id')
            ->toArray();
        return view('tasks.create', compact('task', 'taskStatuses', 'performers', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'task.name' => 'required',
            'task.status_id' => 'required',
        ]);

        $data = $request->input('task');

        $task = auth()->user()
            ->tasks()
            ->create($data);
        if (isset($data['labels'])) {
            $task
                ->labels()
                ->attach($data['labels']);
        }
        flash(__('validation.created', ['name' => 'Задача', 'end' => 'а']))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $taskStatuses = TaskStatus::all()->pluck('name', 'id')->toArray();
        $performers = User::all()->pluck('name', 'id')->toArray();
        $labels = Label::all()->pluck('name', 'id')->toArray();
        return view('tasks.edit', compact('task', 'taskStatuses', 'performers', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Task $task): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'task.name' => 'required',
            'task.status_id' => 'required',
        ]);

        $data = $request->input('task');
        $task->fill($data)
            ->save();
        if (isset($data['labels'])) {
            $task->labels()
                ->sync($data['labels']);
        }
        flash(__('validation.updated', ['name' => 'Задача', 'end' => 'а']))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        if (!auth()->user()->creator($task)) {
            flash(__('validation.noRights'))->error();
            return redirect()->route('tasks.index');
        }

        /** @phpstan-ignore-next-line */
        if ($task) {
            $task->delete();
        }

        flash(__('validation.destroyed', ['name' => 'Задача', 'end' => 'а']))->success();
        return redirect()->route('tasks.index');
    }
}
