<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\Episode;
use App\Models\Podcast;
use App\Http\Controllers\Controller;
use App\Http\Resources\EpisodeResource;
use App\Http\Resources\PodcastResource;

class HomeController extends Controller
{
    /**
     * Display a listing of podcasts resources along with featured and newly added episodes.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Get the date 14 days ago from now
        $fourteenDaysAgo = Carbon::now()->subDays(14);
        // Get the current date and time
        $now = Carbon::now();

        // Retrieve newly added episodes within the last 14 days, ordered by creation date
        $newlyAddedEpisodes = Episode::whereBetween('created_at', [$fourteenDaysAgo, $now])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Return a JSON response with the podcasts, featured podcasts, and newly added episodes
        return response()->json([
            'status' => 'success',
            'message' => 'Podcasts data loaded successfully.',
            'data' => [
                'podcasts' => PodcastResource::collection(Podcast::paginate(10)),
                'featured' => PodcastResource::collection(Podcast::where('is_featured', true)->take(5)->get()),
                'newlyAddedEpisodes' => EpisodeResource::collection($newlyAddedEpisodes),
            ],
        ]);
    }
}
