<?php

namespace App\Http\Controllers;

use App\Models\Gold;
use Carbon\Carbon;


class GoldAPIController extends Controller
{
    public function today(){
        $date = Carbon::today();
        $gold = Gold::whereDate('created_at', $date)->get();
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'date' => $date->format('d-m-Y'), // '20-10-2021
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold
        ], 200);
    }

    public function yesterday(){
        $date = Carbon::yesterday();
        $gold = Gold::select('created_at as date')->whereDate('created_at', $date)->firstOrFail();
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'date' => $date->format('d-m-Y'), // '20-10-2021
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold
        ], 200);
    }

    public function lastWeek(){
        $date = Carbon::today()->subDays(7);
        $gold = Gold::whereDate('created_at', '>=', $date)->get();
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'price' => 'last week',
            'unit' => 'BDT/Gram',
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold
        ], 200);
    }
}
