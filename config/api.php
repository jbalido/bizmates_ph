<?php

return [
    'foursquare_client_id' => 'T4ECOXET04EWN32S1DIKM5X3PVTAROIGJSUHU54SJ45ZMSX2',
    'foursquare_client_secret' => 'WR0WQD4XS3FW54LEHVSB0UGTOCHBCBKKDDQP2H5UJ0QSUSQL',
    'foursquare_version' => '20180323',
    'foursquare_url' => 'https://api.foursquare.com/v2/venues/explore',
    'weather_url' => 'api.openweathermap.org/data/2.5/weather',
    'weather_app' => '6cecb5d0d9b75d2fde6a77d6abfe5fb7',

    // Table mapper, this will map the field from API Provider to Players' table
    'mapper' => [
        'root' => 'response',
        'response' => [
            'fields' => [
                'lat',
                'lng',
                'displayString',
                'slug',
                'longId'
            ], //place details
            'groups' => [ //recommended places
                'id' => 'id',
                'name' => 'name',
                'contact' => 'contact',
                'location' => 'location',
                'categories' => 'categories'
            ],
        ],
    ]
];
