<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Controller handling home page and public event listings
 */
class HomeController extends Controller
{
    /**
     * Display paginated list of upcoming events with optional category filtering
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Event::with(['organiser', 'categories'])
            ->where('event_datetime', '>', now())
            ->orderBy('event_datetime');

        // Category filtering
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query->paginate(8);
        $categories = Category::orderBy('name')->get();
        $selectedCategory = $request->category;

        return view('home', compact('events', 'categories', 'selectedCategory'));
    }

    /**
     * AJAX endpoint for category filtering
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterByCategory(Request $request)
    {
        $query = Event::with(['organiser', 'categories'])
            ->where('event_datetime', '>', now())
            ->orderBy('event_datetime');

        if ($request->filled('category') && $request->category !== 'all') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query->paginate(8);
        
        return response()->json([
            'events' => view('partials.event-list', compact('events'))->render(),
            'pagination' => $events->appends($request->query())->links()->render()
        ]);
    }
}