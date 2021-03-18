<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class, 'label');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $labels = Label::all();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $label = new Label();
        return view('labels.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
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
     * @param Label $label
     * @return Application|Factory|View|Response
     */
    public function edit(Label $label)
    {
        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Label $label
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Label $label): RedirectResponse
    {
        $this->validate($request, [
            /* @phpstan-ignore-next-line */
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
     * @param Label $label
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Label $label): RedirectResponse
    {
        /* @phpstan-ignore-next-line */
        if ($label) {
            $label->delete();
        }

        flash(trans_choice('validation.destroyed', 2, ['name' => 'Метка']))->success();
        return redirect()->route('labels.index');
    }
}
