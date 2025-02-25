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

use App\Containers\Vendor\ResponseLog\Actions\GetAllResponseLogsAction;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Containers\Vendor\ResponseLog\Tests\UnitTestCase;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAllResponseLogsActionTest extends UnitTestCase
{
    public function test(): void
    {
        $total = 12;

        ResponseLogModel::factory()->count($total)->create();

        $result = app(GetAllResponseLogsAction::class)->run();
        $this->assertInstanceOf(LengthAwarePaginator::class, $result);
        $this->assertSame($total, $result->total());
    }
}
