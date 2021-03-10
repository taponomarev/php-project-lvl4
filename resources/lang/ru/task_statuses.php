<?php

return [
    'controller' => [
        'store' => [
            'success' => 'Статус успешно создан'
        ],
        'update' => [
            'success' => 'Статус успешно обновлен'
        ],
        'destroy' => [
            'success' => 'Статус успешно удален',
            'warning' => 'Не удалось удалить статус'
        ]
    ],
    'views' => [
        'index' => [
            'h1' => 'Статусы',
            'create_status_btn' => 'Создать статус',
            'table' => [
                'thead' => [
                    'id' => 'ID',
                    'name' => 'Имя',
                    'created_at' => 'Дата создания',
                    'action' => 'Действия'
                ],
                'tbody' => [
                    'edit_link' => 'Изменить',
                    'destroy_link' => 'Удалить'
                ]
            ]
        ],
        'create' => [
            'h1' => 'Создать статус',
        ],
        'form' => [
            'name' => 'Имя',
            'create_btn' => 'Создать',
            'edit_btn' => 'Обновить'
        ],
        'edit' => [
            'h1' => 'Изменить статус'
        ]
    ]
];
