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

namespace App\Containers\Vendor\ResponseLog\Tests\Unit\Actions;

use App\Containers\Vendor\ResponseLog\Actions\DeleteResponseLogsEarlyForAction;
use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Containers\Vendor\ResponseLog\Tests\UnitTestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class DeleteResponseLogsEarlyForActionTest extends UnitTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $now = Carbon::now()->subDays(5);

        DB::table(ResponseLogModel::TABLE)
            ->insert([
                ResponseLog::IP_ADDRESS => '127.0.0.1',
                ResponseLog::CODE => 404,
                ResponseLog::EXCEPTION => 'Internal Server Error',
                ResponseLog::MESSAGE => 'Internal Server Error',
                ResponseLog::ERRORS => '{}',
                ResponseLog::TRACE => '{}',
                CREATED_AT => $now,
                UPDATED_AT => $now
            ]);
    }

    public function testSuccess(): void
    {
        $this->assertSame(1, app(DeleteResponseLogsEarlyForAction::class)->run(5));
    }

    public function testNoForDelete(): void
    {
        $this->assertSame(ZERO, app(DeleteResponseLogsEarlyForAction::class)->run());
    }
}
