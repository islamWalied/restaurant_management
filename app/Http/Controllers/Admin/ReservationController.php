<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Tables;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view("admin.reservations.index",compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Tables::where('status', TableStatus::Available)->get();
        return view("admin.reservations.create",compact("tables"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Tables::findOrfail($request->table_id);
        if ($request->guest_no > $table->guest_number){
            return back()->with('warning', "Please choose the table base on guests." );
        }

//        $request_date = Carbon::parse($request->date);
//
//        foreach($table->reservations as $res){
//            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
//                return back()->with('warning', "this table is reserved for this date" );
//            }
//        }



        Reservation::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'res_date' => $request->date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_no,
        ]);

        return to_route('admin.reservations.index')->with('success',"The Reservation is created successfully");

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
    public function edit(Reservation $reservation)
    {
        $tables = Tables::where('status', TableStatus::Available)->get();
        return view("admin.reservations.edit",compact("reservation","tables"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Tables::findOrfail($request->table_id);
        if ($request->guest_no > $table->guest_number){
            return back()->with('warning', "Please choose the table base on guests." );
        }
        $reservation->update([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'res_date' => $request->date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_no,
            ]);

        return to_route("admin.reservations.index")->with('success',"The Reservation is updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route("admin.reservations.index")->with('success',"The Reservation is deleted successfully");
    }
}
