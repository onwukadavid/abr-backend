<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Podcast;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PodcastResource;
use Illuminate\Database\Eloquent\Builder;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // If category is provided, filter the podcasts by that category
        if ($request->category){
            $podcasts = Podcast::whereHas('category', function (Builder $query) use($request){
                // Filter the podcasts by the category slug
                $query->where('slug', $request->category);
            })->paginate(10);
            return response()->json([
                'status' => 'success',
                'message' => 'Podcast data loaded successfully.',
                'data' => [
                    // Return the filtered podcasts
                    'podcasts' => PodcastResource::collection($podcasts)
                ],
            ]);
        }
        // If no category is provided, return all podcasts
        $podcasts = Podcast::paginate();

        return PodcastResource::collection($podcasts)->additional([
            'status' => 'success',
            'message' => 'Podcast data loaded successfully.',
        ]);
    }

    /**
     * Display the specified podcast resource.
     */
    public function show(Podcast $podcast)
    {
        try {
            // Return the podcast data as a JSON response
            return response()->json([
                'status' => 'success',
                'message' => 'Podcast data loaded successfully.',
                'data' => [
                    'podcast' => PodcastResource::make($podcast)
                ],
            ]);
        } catch (\Exception) {
            // Return an error response if the podcast is not found
            return response()->json([
                'status' => 'error',
                'message' => 'Podcast not found.',
            ], 400);
        }
    }
}
