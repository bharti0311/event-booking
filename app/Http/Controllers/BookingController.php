<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Fetch all bookings
 public function index(Request $request)
    {
        // fetch bookings
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    // Existing store method
    public function store(Request $request)
    {
        $data = $request->validate([
            'event_id' => 'required|integer',
            'user_id' => 'nullable|integer',
            'event_title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_location' => 'nullable|string|max:255',
            'event_duration' => 'nullable|string|max:50',
            'event_organizer' => 'nullable|string|max:255',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'status' => 'required|string|max:50',
            'user_name' => 'nullable|string|max:255',
            'user_email' => 'nullable|email|max:255',
        ]);

        $booking = Booking::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Booking confirmed',
            'booking' => $booking
        ], 201);
    }



    
}
