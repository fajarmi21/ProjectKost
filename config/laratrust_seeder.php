<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'seleksi' => 'c,r,u,d',
            'bantuan' => 'c,r,u,d',
            'pengambilan' => 'r,u'
        ],
        'kades' => [
            'users' => 'c,r,u,d',
            'seleksi' => 'r,u'
        ],
        'bank' => [
            'users' => 'c,r,u,d',
            'pengambilan' => 'r,u'
        ],
        'masyarakat' => [
            'masyarakat' => 'r,u,c',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
