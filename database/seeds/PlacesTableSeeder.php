<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$client_id 		= config('api.foursquare_client_id');
    	$client_secret  = config('api.foursquare_client_secret');
    	$version 		= config('api.foursquare_version');

        DB::table('places')->insert([
            'name' => 'Tokyo',
            'query' => '?near=Tokyo,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'tokyo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('places')->insert([
            'name' => 'Yokohama',
            'query' => '?near=Yokohama,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'yokohama-shi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('places')->insert([
            'name' => 'Kyoto',
            'query' => '?near=Kyoto,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'kyoto-japan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('places')->insert([
            'name' => 'Osaka',
            'query' => '?near=Osaka,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'ōsaka-shi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('places')->insert([
            'name' => 'Sapporo',
            'query' => '?near=Sapporo,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'sapporo-shi-japan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('places')->insert([
            'name' => 'Nagoya',
            'query' => '?near=Nagoya,JP&v='.$version.'&client_id='.$client_id.'&client_secret='.$client_secret,
            'slug' => 'nagoya-shi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}