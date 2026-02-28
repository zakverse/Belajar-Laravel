<?php

return[
    'author' => [
        'first' => env('AUTHOR_FIRST', 'Dzaki'), //Ambil nilai dari env AUTHOR_FIRST, jika tidak ada maka gunakan default Dzaki
        'last' => env('AUTHOR_LAST', 'Khothir'),
    ],
    'email' => env('AUTHOR_EMAIL', 'dzaki@example.com'),
    'website' => env('AUTHOR_WEBSITE', 'www.dzakikhothir.com')
    
];