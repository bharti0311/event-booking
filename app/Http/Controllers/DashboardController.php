<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Controller handling organiser dashboard with raw SQL reporting
 */
class DashboardController extends Controller
{
    /**
     * Display organiser dashboard with events report using raw SQL
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!Auth::user()->isOrganiser()) {
            return redirect()->route('home')->with('error', 'Access denied. Organisers only.');
        }

        // Raw SQL query as required by specification (Requirement 6)
        $eventsReport = DB::select("
            SELECT 
                e.id,
                e.title as event_title,
                e.event_datetime as event_date,
                e.capacity as total_capacity,
                COALESCE(b.booking_count, 0) as current_bookings,
                (e.capacity - COALESCE(b.booking_count, 0)) as remaining_spots
            FROM events e
            LEFT JOIN (
                SELECT 
                    event_id, 
                    COUNT(*) as booking_count
                FROM bookings 
                GROUP BY event_id
            ) b ON e.id = b.event_id
            WHERE e.organiser_id = ?
            ORDER BY e.event_datetime
        ", [Auth::id()]);

        return view('dashboard', compact('eventsReport'));
    }
}