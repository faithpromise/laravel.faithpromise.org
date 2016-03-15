<?php

return [
    'ident'                 => 'fpstudents',
    'name'                  => 'fpStudents',
    'title'                 => 'fpStudents - Student Ministry of Faith Promise Church',
    'description'           => 'The student ministry of Faith Promise Church', // TODO: Update title
    'logo'                  => 'logo-fpstudents',
    'google_tag_manager_id' => 'GTM-PK3SNW',
    'nav'                   => [
        [
            'title' => 'Times & Locations',
            'url'   => '/locations',
            'id'    => 'locations'
        ],
        [
            'title' => 'Sermons',
            'url'   => '/sermons',
            'id'    => 'sermons'
        ],
        [
            'title' => 'Events',
            'url'   => '/updates',
            'id'    => 'updates'
        ]
    ],

    'footer_nav' => [
        [
            'title' => 'Times &amp; Locations',
            'url'   => '/locations',
            'id'    => 'to_locations_from_footer'
        ],
        [
            'title' => 'Events &amp; Updates',
            'url'   => '/updates',
            'id'    => 'to_events_from_footer'
        ],
        [
            'title' => 'Parent Blog',
            'url'   => 'http://fpstudents.tumblr.com',
            'id'    => 'to_blog_from_footer'
        ]
    ]
];