<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = TaskStatus::all();
        return view('task_statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('task_statuses.create', compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses'
        ]);

        auth()->user()->taskStatuses()->create($data);
        flash(__('validation.created', ['name' => 'Статус', 'end' => '']))->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TaskStatus   $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TaskStatus $taskStatus): \Illuminate\Http\RedirectResponse
    {
        $data = $this->validate($request, [
            /**
            * @phpstan-ignore-next-line
            */
            'name' => 'required|unique:task_statuses,name,' . $taskStatus->id,
        ]);

        $taskStatus->fill($data);
        $taskStatus->save();
        flash(trans_choice('validation.updated', 1, ['name' => 'Статус']))->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TaskStatus $taskStatus): \Illuminate\Http\RedirectResponse
    {
        if (!auth()->user()->creator($taskStatus)) {
            flash(__('validation.noRights'))->error();
            return redirect()->route('task_statuses.index');
        }

        /**
 * @phpstan-ignore-next-line
*/
        if ($taskStatus) {
            $taskStatus->delete();
        }

        flash(trans_choice('validation.destroyed', 1, ['name' => 'Статус']))->success();
        return redirect()->route('task_statuses.index');
    }
}
