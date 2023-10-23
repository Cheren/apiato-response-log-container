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
 */

use App\Containers\Vendor\ResponseLog\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('response-logs', [Controller::class, 'getAllResponseLogs'])
    ->name('api_vendor_response_logs_get_all_response_logs')
    ->middleware(['auth:api']);
