<?php

namespace App\Http\Controllers\Admin;

use App\Actions\StoreTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Tables;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Tables::all();
        return view("admin.tables.index",compact("tables"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.tables.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request,StoreTableAction $storetable)
    {
        $storetable->execute($request);

        return to_route('admin.tables.index')->with('success',"The Table is created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tables $table)
    {
        return view("admin.tables.edit",compact("table"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Tables $table)
    {
        $table->update($request->validated());

        return to_route("admin.tables.index")->with('success',"The Table is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tables $table)
    {
        $table->delete();
        $table->reservations()->delete();
        return to_route("admin.tables.index")->with('success',"The Table is deleted successfully");
    }
}
