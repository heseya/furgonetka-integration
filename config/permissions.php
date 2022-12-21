<?php

declare(strict_types=1);

return [
    'required' => [
        'auth.check_identity',
        'orders.show',
        'orders.show_details',
        'orders.edit',
    ],

    'internal' => [
        [
            'name' => 'configure',
            'display_name' => 'Możliwość zmiany ustawień integracji z Furgonetka.pl',
        ],
    ],
];
