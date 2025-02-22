<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\BlogPost;
use App\Models\Movie;

class BlogPostTest extends TestCase
{
    /**
     * Test if a blog post can be created.
     */
    public function test_can_create_blog_post()
    {
        $movie = Movie::factory()->create();

        $data = [
            'title' => 'Great Movie',
            'content' => 'This is a great movie.',
            'movie_id' => $movie->id,
        ];

        $blogPost = BlogPost::create($data);

        $this->assertInstanceOf(BlogPost::class, $blogPost);
        $this->assertEquals('Great Movie', $blogPost->title);
        $this->assertEquals('This is a great movie.', $blogPost->content);
        $this->assertEquals($movie->id, $blogPost->movie_id);
    }

    /**
     * Test if a blog post can be updated.
     */
    public function test_can_update_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
            'movie_id' => $blogPost->movie_id,
        ];

        $blogPost->update($data);

        $this->assertEquals('Updated Title', $blogPost->title);
        $this->assertEquals('Updated Content', $blogPost->content);
    }

    /**
     * Test if a blog post can be deleted.
     */
    public function test_can_delete_blog_post()
    {
        $blogPost = BlogPost::factory()->create();

        $blogPost->delete();

        $this->assertNull(BlogPost::find($blogPost->id));
    }
}
