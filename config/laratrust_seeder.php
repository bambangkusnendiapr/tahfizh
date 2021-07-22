<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'pendaftaran' => 'c,r,u,d',
            'santri' => 'c,r,u,d',
            'buku' => 'c,r,u,d',
            'guru' => 'c,r,u,d',
            'kelas' => 'c,r,u,d',
            'pengguna' => 'c,r,u,d',
            'artikel' => 'c,r,u,d',
            'surat' => 'c,r,u,d',
            'kategori' => 'c,r,u,d',
            'role' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'menu' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'admin' => [
            'pendaftaran' => 'c,r,u,d',
            'santri' => 'c,r,u,d',
            'buku' => 'c,r,u,d',
            'guru' => 'c,r,u,d',
            'kelas' => 'c,r,u,d',
            'pengguna' => 'c,r,u,d',
            'artikel' => 'c,r,u,d',
            'surat' => 'c,r,u,d',
            'kategori' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'guru' => [
            'profile' => 'r,u',
            'santri' => 'r,u',
            'buku' => 'r,u',
            'guru' => 'r',
            'kelas' => 'r',
            'artikel' => 'c,r,u,d',
        ],
        'santri' => [
            'profile' => 'r,u',
            'santri' => 'r',
            'buku' => 'r',
            'guru' => 'r',
            'kelas' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ]
];
