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

namespace App\Containers\Vendor\ResponseLog\Tests\Unit\Actions;

use App\Containers\Vendor\ResponseLog\Actions\CreateResponseLogAction;
use App\Containers\Vendor\ResponseLog\Dto\CreateResponseLogDto;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Tests\TestCase;
use Illuminate\Support\Facades\Request;
use Exception;

final class CreateResponseLogActionTest extends TestCase
{
    public function test(): void
    {
        $dto = new CreateResponseLogDto([
            'ip_address' => Request::ip(),
            'code' => 404,
            'exception' => Exception::class,
            'message' => 'Message',
            'request' => app('request')
        ]);

        $result = app(CreateResponseLogAction::class)->run($dto);

        $this->assertInstanceOf(ResponseLog::class, $result);
    }
}
