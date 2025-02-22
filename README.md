# Movie Blog API

## Setup Instructions

1. Clone the repository:
   ```sh
   git clone <your-repository-url>
   cd movie-blog-api

2. install dependencies:
composer install

3. Copy .env.example to .env and update your database credentials:
   cp .env.example .env

4. Generate application key:
    php artisan key:generate

5. Run migration:
    php artisan migrate

6. Start the server:
    php artisan serve

7.  Database Migration Command:
     php artisan migrate


# Example of API Requests

## create a Movie:
POST /api/movies
{
  "title": "Inception",
  "genre": "Sci-Fi",
  "release_date": "2010-07-16"
}

## Get All Movies:
GET /api/blog-posts