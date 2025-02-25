<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    Proprietary
 * @copyright  Copyright (C) zemlechist.ru, All rights reserved.
 * @link       https://zemlechist.ru
 */

namespace App\Containers\Vendor\ResponseLog\Tests\Unit\Actions;

use App\Containers\Vendor\ResponseLog\Actions\FindResponseLogByIdAction;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Containers\Vendor\ResponseLog\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;

final class FindResponseLogByIdActionTest extends UnitTestCase
{
    public function testWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);
        app(FindResponseLogByIdAction::class)->run(2131243);
    }

    public function testWithActualId(): void
    {
        $log = ResponseLogModel::factory()->create();
        $this->assertInstanceOf(
            ResponseLogModel::class,
            app(FindResponseLogByIdAction::class)->run($log->id)
        );
    }
}
