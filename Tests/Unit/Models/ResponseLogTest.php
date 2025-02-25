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

namespace App\Containers\Vendor\ResponseLog\Tests\Unit\Models;

use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Containers\Vendor\ResponseLog\Tests\UnitTestCase;
use JBZoo\Data\JSON;

final class ResponseLogTest extends UnitTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->model = ResponseLogModel::factory()->create();
    }

    public function testModelInstance(): void
    {
        $this->assertInstanceOf(ResponseLogModel::class, $this->model);
    }

    public function testModelTableName(): void
    {
        $this->assertSame(ResponseLogModel::TABLE, $this->model->getTable());
    }

    public function testTimestamp(): void
    {
        $this->assertTrue($this->model->timestamps);
    }

    public function testGetResourceKey(): void
    {
        $this->assertSame(ResponseLogModel::RESOURCE_KEY, $this->model->getResourceKey());
    }

    public function testFillable(): void
    {
        $fields = [
            ResponseLog::IP_ADDRESS,
            ResponseLog::CODE,
            ResponseLog::EXCEPTION,
            ResponseLog::MESSAGE,
            ResponseLog::ERRORS,
            ResponseLog::FILE,
            ResponseLog::LINE,
            ResponseLog::TRACE,
            ResponseLog::REQUEST
        ];

        foreach ($fields as $field) {
            $this->assertTrue(in_array($field, $this->model->getFillable()));
        }
    }

    public function testCast(): void
    {
        $this->assertInstanceOf(JSON::class, $this->model->errors);
        $this->assertInstanceOf(JSON::class, $this->model->trace);
        $this->assertInstanceOf(JSON::class, $this->model->request);
    }
}
