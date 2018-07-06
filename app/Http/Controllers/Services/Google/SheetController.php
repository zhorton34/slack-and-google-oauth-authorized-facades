<?php

namespace App\Http\Controllers\Services\Google;

use Illuminate\Http\Request;
use App\Services\Google\Drive;
use App\Http\Controllers\Controller;
use GoogleDrive;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Drive $drive)
    {
        GoogleDrive::search()->folders();
        GoogleDrive::search()->documents();
        GoogleDrive::search()->spreadsheets();
        GoogleDrive::folder()->create('New Folder');
        GoogleDrive::document()->create('New Document');
        GoogleDrive::spreadsheet()->create('New Spreadsheet');


        /*$drive->document()->create('Updated Zak Test');
        $drive->directory()->create('Updated Zak Test');
        $drive->spreadsheet()->create('Updated Zak Test'); */

        //$drive->build()->directory('New Zak Test')->create();
        //$drive->spreadSheet()->setName('New Spread Sheet')->make();
        //$drive->search()->spreadsheets();
        //$drive->search()->all();

        return view('sheets.sheet');
    }

    public function getSheet(Drive $drive)
    {
        return Sheets::spreadSheetList();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Drive $drive)
    {
        $drive->spreadSheet()->setTitle(request('name'))->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
