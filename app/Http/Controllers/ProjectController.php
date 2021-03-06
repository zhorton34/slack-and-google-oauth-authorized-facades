<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GoogleDrive;
use Slack;
use Git;

class ProjectController extends Controller
{
    public function index()
    {
        GoogleDrive::folder()->create('zakhortontest');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $name = request('name');

        //Git::projects()->create($name) implented on branch #18 teamlab.cleancode.studio repo;
        Slack::channels()->create(['name' => $name]);
        Slack::channels()->create(['name' => $name . '-dev']);

        GoogleDrive::folders()->create($name);
        GoogleDrive::documents()->create($name);
        GoogleDrive::spreadsheets()->create($name);

        $folder = GoogleDrive::search()->folders()->where('name', $name);
        $document = GoogleDrive::search()->documents()->where('name', $name);
        $spreadsheet = GoogleDrive::search()->spreadsheets()->where('name', $name);

        GoogleDrive::move()->resource($document)->to($folder);
        GoogleDrive::move()->resource($spreadsheet)->to($folder);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
