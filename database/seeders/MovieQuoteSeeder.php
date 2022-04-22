<?php

namespace Database\Seeders;

use App\Models\MovieQuote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MovieQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieQuote::truncate();

        $json = File::get('database/data/moviequotes.json');
        $data = json_decode($json);

        foreach ($data as $key => $value){
            MovieQuote::create([
                'movie_title' => $value->movie,
                'quote' => $value->quote,
                'type' => $value->type,
                'year' => $value->year,
            ]);
        }
    }
}
