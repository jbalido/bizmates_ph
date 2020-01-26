<?php

return [
    'foursquare_client_id' => 'T4ECOXET04EWN32S1DIKM5X3PVTAROIGJSUHU54SJ45ZMSX2',
    'foursquare_client_secret' => 'WR0WQD4XS3FW54LEHVSB0UGTOCHBCBKKDDQP2H5UJ0QSUSQL',
    'foursquare_version' => '20180323',
    'foursquare_url' => 'https://api.foursquare.com/v2/venues/explore',

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
