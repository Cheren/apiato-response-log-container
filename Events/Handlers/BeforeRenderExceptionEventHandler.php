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

namespace App\Containers\Vendor\ResponseLog\Events\Handlers;

use App\Ship\Events\BeforeRenderExceptionEvent;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Events\Event;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BeforeRenderExceptionEventHandler extends Event
{
    /**
     * @param BeforeRenderExceptionEvent $event
     * @return void
     * @throws CreateResourceFailedException
     * @throws UnknownProperties
     */
    public function handle(BeforeRenderExceptionEvent $event): void
    {
        response_log()
            ->write([
                'exception' => $event->getException(),
                'request' => $event->getRequest()
            ]);
    }
}
