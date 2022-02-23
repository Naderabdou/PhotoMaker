<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Social::create([
            'facebook_url'=>'https://web.facebook.com',
            'twitter_url'=>'https://twitter.com',
            'github_url'=>'https://github.com/'
        ]);
    }
}
