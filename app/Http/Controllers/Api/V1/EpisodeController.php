<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Episode;
use App\Http\Resources\EpisodeResource;
use App\Http\Controllers\Controller;
use Exception;

class EpisodeController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        try{
            return response()->json([
                'status' => 'success',
                'message' => 'Episode loaded successfully.',
                'data' => [
                    'episode' => EpisodeResource::make($episode)
                ],
            ]);        
        }catch (\Exception){
            return response()->json([
                'status' => 'error',
                'message' => 'Episode not found.',
            ], 400);
        }
        
    }
}
