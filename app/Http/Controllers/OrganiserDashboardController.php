namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganiserDashboardController extends Controller
{
    public function index()
    {
        $organiserId = Auth::id();

        // Raw SQL required by assignment
        $events = DB::select("
            SELECT 
                e.id, e.title, e.date_time, e.capacity,
                COUNT(b.id) as current_bookings,
                (e.capacity - COUNT(b.id)) as remaining_spots
            FROM events e
            LEFT JOIN bookings b ON e.id = b.event_id
            WHERE e.organiser_id = ?
            GROUP BY e.id, e.title, e.date_time, e.capacity
            ORDER BY e.date_time ASC
        ", [$organiserId]);

        return view('organiser.dashboard', compact('events'));
    }
}
