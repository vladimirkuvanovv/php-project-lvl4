<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $labels = Label::all();

        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $label = new Label();

        return view('labels.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:30',
            'description' => 'max:200',
        ]);

        Label::create($data);

        flash('Label was created!')->success();

        return redirect()->route('labels.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $label = Label::findOrFail($id);

        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $label = Label::findOrFail($id);

        $data = $this->validate($request, [
            'name' => 'required|max:30',
            'description' => 'max:200',
        ]);

        $label->fill($data);
        $label->save();

        flash('Label was updated!')->success();

        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Label::destroy($id);

        return redirect()->route('labels.index');
    }
}
