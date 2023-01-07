<?php

namespace App\Http\Controllers\Api;

use App\Models\Notepad;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotepadResource;
use App\Http\Requests\StoreNotepadRequest;
use App\Http\Requests\UpdateNotepadRequest;

class NotepadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notepad = Notepad::latest()->get();
        return new NotepadResource($notepad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotepadRequest $request)
    {
        $notepad = Notepad::create($request->all());
        return new NotepadResource($notepad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notepad  $notepad
     * @return \Illuminate\Http\Response
     */
    public function show(Notepad $notepad)
    {
        return new NotepadResource($notepad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notepad  $notepad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotepadRequest $request, Notepad $notepad)
    {
        $notepad->update($request->all());
        return new NotepadResource($notepad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notepad  $notepad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notepad $notepad)
    {
        $notepad->delete();
        return new NotepadResource(['message'=>'Catatan Berhasil dihapus.']);
    }
}
