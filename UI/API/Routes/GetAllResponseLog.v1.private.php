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
 *
 * @apiGroup           VendorResponseLog
 * @apiName            getAllResponseLogs
 *
 * @api                {GET} /v1/response-logs Список
 * @apiDescription     Получить список всех логов
 *
 * @apiVersion         1.0.0
 * @apiPermission      Аутентифицированный пользователь
 *
 * @apiSuccessExample  {json}  Успешный ответ:
 * HTTP/1.1 200 OK
{
    "data": [
        {
            "object": "ResponseLog",
            "id": "NxOpZowo9GmjKqdR",
            "ip_address": "88.147.153.180",
            "code": 401, // Код ошибки
            "exception": "App\\Ship\\Exceptions\\AuthenticationException", // Исключение которое выдало ошибку
            "message": "An Exception occurred when trying to authenticate the User.", // Сообщение
            "errors": {}, // Объект ошибок. Сервер выдает их при не верной валидации
            "file": "path/to/file.php", // Файл в котором появилась ошибка
            "line": 39, // Строка которая вызвала ошибка
            "trace": { // Цепочка обращений до ошибки
                "0": {
                    "file": "/Illuminate/Auth/Middleware/Authenticate.php",
                    "line": 42
                }
            },
            "request": { // Данные пзапроса сервера
                "method": "GET",
                "attributes": [],
                "request": {
                    "page": "1",
                    "include": "roles,human.organizations,human.priority_organization,amoCrmUser",
                    "to": "list"
                },
            },
            "created_at": 1699990683,
            "updated_at": 1699990683
        }
    ]
}
 */

use App\Containers\Vendor\ResponseLog\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('response-logs', [Controller::class, 'getAllResponseLogs'])
    ->name('api_vendor_response_logs_get_all_response_logs')
    ->middleware(['auth:api']);
