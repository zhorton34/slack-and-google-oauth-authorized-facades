<?php

namespace App\Http\Controllers;

use App\Job;
use App\Http\Requests\JobRequest as Request;

class JobController extends Controller
{
    function __construct()
    {
    }
    public function index()
    {
        return view('jobs/index');
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function store(Request $request, Job $job)
    {
        $job->fill($request->input());
        $job->save();
    }

    public function show(Job $job)
    {
        //
    }

    public function edit(Job $job)
    {
        //
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        //
    }
}
