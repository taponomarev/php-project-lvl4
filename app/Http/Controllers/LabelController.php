<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::all();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $label = new Label();
        return view('labels.create', compact('label'));
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
           'name' => 'required|unique:labels'
        ]);

        auth()->user()->labels()->create($request->except('_token'));
        flash(__('validation.created', ['name' => 'Метка', 'end' => 'а']))
            ->success();
        return redirect()->route('labels.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Label $label
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Label $label): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            /** @phpstan-ignore-next-line */
           'name' => 'required|unique:labels,name,' . $label->id
        ]);

        $label->fill($request->except('_token'))
            ->save();
        /* @phpstan-ignore-next-line */
        flash(trans_choice('validation.updated', 2, ['name' => 'Метка']))->success();
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Label $label
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Label $label): \Illuminate\Http\RedirectResponse
    {
        if (!auth()->user()->creator($label)) {
            flash(__('validation.noRights'))->error();
            return redirect()->route('labels.index');
        }

        /** @phpstan-ignore-next-line */
        if ($label) {
            $label->delete();
        }

        flash(trans_choice('validation.destroyed', 2, ['name' => 'Метка']))->success();
        return redirect()->route('labels.index');
    }
}
