<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Event;

class OrganiserController extends Controller
{
    public function dashboardData()
    {
        $user = JWTAuth::parseToken()->authenticate();

        $events = Event::where('organiser_id',$user->id)->get()->map(function($e){
            $e->current_bookings = $e->bookings()->count();
            $e->remaining_spots = $e->capacity - $e->current_bookings;
            return $e;
        });

        return response()->json(['events'=>$events]);
    }
}
