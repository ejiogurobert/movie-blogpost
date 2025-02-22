<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->has('genre')) {
            $query->where('genre', $request->genre);
        }

        if ($request->has('release_date')) {
            $query->whereDate('release_date', $request->release_date);
        }

        return response()->json([
            'success' => true,
            'message' => 'Movies retrieved successfully',
            'data' => MovieResource::collection($query->paginate(10))
        ], Response::HTTP_OK);
    }

    public function store(MovieRequest $request)
    {
        try {
            $movie = Movie::create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Movie created successfully',
                'data' => new MovieResource($movie)
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating movie',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Movie $movie)
    {
        return response()->json([
            'success' => true,
            'message' => 'Movie retrieved successfully',
            'data' => new MovieResource($movie)
        ], Response::HTTP_OK);
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        try {
            $movie->update($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Movie updated successfully',
                'data' => new MovieResource($movie)
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating movie',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Movie $movie)
    {
        try {
            $movie->delete();
            return response()->json([
                'success' => true,
                'message' => 'Movie deleted successfully'
            ], Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting movie',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
