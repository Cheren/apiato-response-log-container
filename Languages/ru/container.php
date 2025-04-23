<?php

/**
 * APIATO setting container.
 *
 * This file is part of the APIATO setting container.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    Proprietary
 * @copyright  Copyright (C) kalistratov.ru, All rights reserved.
 * @link       https://kalistratov.ru
 */

return [
    'name' => 'Журнал ошибок API',
    'command' => [
        'delete' => [
            'description' => 'Удалить лог ошибок из базы данных',
            'early_for' => 'Количество дней раннее от которого удалить логи ошибок',
            'no_data_to_delete' => 'Нет данных для удаления.',
            'result' => 'Всего удленно: :total'
        ]
    ]
];
