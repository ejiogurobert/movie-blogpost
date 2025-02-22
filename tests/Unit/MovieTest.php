<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Movie;

class MovieTest extends TestCase
{
    /**
     * Test if a movie can be created.
     */
    public function test_can_create_movie()
    {
        $data = [
            'title' => 'Inception',
            'genre' => 'Sci-Fi',
            'release_date' => '2010-07-16',
        ];

        $movie = Movie::create($data);

        $this->assertInstanceOf(Movie::class, $movie);
        $this->assertEquals('Inception', $movie->title);
        $this->assertEquals('Sci-Fi', $movie->genre);
        $this->assertEquals('2010-07-16', $movie->release_date);
    }

    /**
     * Test if a movie can be updated.
     */
    public function test_can_update_movie()
    {
        $movie = Movie::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'genre' => 'Updated Genre',
            'release_date' => '2025-01-01',
        ];

        $movie->update($data);

        $this->assertEquals('Updated Title', $movie->title);
        $this->assertEquals('Updated Genre', $movie->genre);
        $this->assertEquals('2025-01-01', $movie->release_date);
    }

    /**
     * Test if a movie can be deleted.
     */
    public function test_can_delete_movie()
    {
        $movie = Movie::factory()->create();

        $movie->delete();

        $this->assertNull(Movie::find($movie->id));
    }
}