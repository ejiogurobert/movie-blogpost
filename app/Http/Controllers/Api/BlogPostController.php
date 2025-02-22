<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\BlogPost;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Http\Resources\BlogPostResource;

class BlogPostController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Blog posts retrieved successfully',
            'data' => BlogPostResource::collection(BlogPost::paginate(10))
        ], Response::HTTP_OK);
    }

    public function store(BlogPostRequest $request)
    {
        try {
            $blogPost = BlogPost::create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Blog post created successfully',
                'data' => new BlogPostResource($blogPost)
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating blog post',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(BlogPost $blogPost)
    {
        return response()->json([
            'success' => true,
            'message' => 'Blog post retrieved successfully',
            'data' => new BlogPostResource($blogPost)
        ], Response::HTTP_OK);
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        try {
            $blogPost->update($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Blog post updated successfully',
                'data' => new BlogPostResource($blogPost)
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating blog post',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(BlogPost $blogPost)
    {
        try {
            $blogPost->delete();
            return response()->json([
                'success' => true,
                'message' => 'Blog post deleted successfully'
            ], Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting blog post',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
