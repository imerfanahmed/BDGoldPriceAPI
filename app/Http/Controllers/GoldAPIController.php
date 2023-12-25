<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;


class GoldAPIController extends Controller
{
    public function today(){
        $date = Carbon::today();
        $gold = Product::whereDate('created_at', $date)->where('type','gold')->get();
        $silver = Product::whereDate('created_at', $date)->where('type','silver')->get();
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'date' => $date->format('d-m-Y'), // '20-10-2021
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold,
            'silver' => $silver
        ], 200);
    }

    public function yesterday(){
        $date = Carbon::yesterday();
        $gold = Product::whereDate('created_at', $date)->where('type','gold')->get();
        $silver = Product::whereDate('created_at', $date)->where('type','silver')->get();
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'date' => $date->format('d-m-Y'), // '20-10-2021
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold,
            'silver' => $silver
        ], 200);
    }

    public function lastWeek(){
        $date = Carbon::now()->subDays(7);
        $gold = [];
        $silver = [];
        for ($i=0; $i < 7; $i++) {
            $gold[$i] = Product::whereDate('created_at', $date)->where('type','gold')->get();
            $silver[$i] = Product::whereDate('created_at', $date)->where('type','silver')->get();
            $date = $date->addDays(1);
        }
        return response()->json([
            'message' => 'Great success! API v1',
            'status' => 'Connected',
            'date' => $date->format('d-m-Y'), // '20-10-2021
            'source' => 'https://www.bajus.org/gold-price',
            'gold' => $gold,
            'silver' => $silver
        ], 200);
    }
}
