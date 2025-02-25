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
use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Containers\Vendor\ResponseLog\Tests\UnitTestCase;
use Exception;
use Illuminate\Support\Facades\Request;

final class CreateResponseLogActionTest extends UnitTestCase
{
    public function test(): void
    {
        $dto = new CreateResponseLogDto([
            ResponseLog::IP_ADDRESS => Request::ip(),
            ResponseLog::CODE => 404,
            ResponseLog::EXCEPTION => Exception::class,
            ResponseLog::MESSAGE => 'Message',
            ResponseLog::REQUEST => app('request')
        ]);

        $result = app(CreateResponseLogAction::class)->run($dto);

        $this->assertInstanceOf(ResponseLogModel::class, $result);
    }
}
