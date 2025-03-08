<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license     https://kalistratov.ru/licenses/erp Proprietary license
 * @copyright   Copyright (C) kalistratov.ru, All rights reserved ©.
 * @link        https://kalistratov.ru
 * @author      Sergey Kalistratov <sergey@kalistratov.ru>
 */

namespace App\Containers\Vendor\ResponseLog\Providers;

use App\Containers\Vendor\ResponseLog\Events\Handlers\BeforeRenderExceptionEventHandler;
use App\Ship\Events\BeforeRenderExceptionEvent;
use App\Ship\Parents\Providers\EventsServiceProvider as ShipEventsServiceProvider;

class EventsServiceProvider extends ShipEventsServiceProvider
{
    protected $listen = [
        BeforeRenderExceptionEvent::class => [
            BeforeRenderExceptionEventHandler::class
        ]
    ];
}
