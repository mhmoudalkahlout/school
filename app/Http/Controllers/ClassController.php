<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Teacher;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassModelRequest;
use App\Http\Requests\UpdateClassModelRequest;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassModel::with('teacher')->latest()->get();
        $teachers = Teacher::get();
        return Inertia::render('Classes/Index', [
            'classes' => $classes,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassModelRequest $request)
    {
        ClassModel::create($request->only('name', 'teacher_id'));
        return redirect()->back()->with('message', 'Class Created Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassModel  $classModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassModelRequest $request, ClassModel $classModel)
    {
        $classModel->update($request->only(['name', 'teacher_id']));
        return redirect()->back()->with('message', 'Class Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassModel  $classModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassModel $classModel)
    {
        $classModel->delete();
        return redirect()->back()->with('message', 'Class Has Been Deleted.');
    }
}
