<?php

namespace App\Actions;

use App\Models\Tables;
use Illuminate\Http\Request;

class StoreTableAction
{



    public function execute(Request $request)
    {
        $user = Tables::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);
    }

}
