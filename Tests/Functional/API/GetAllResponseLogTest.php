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

namespace App\Containers\Vendor\ResponseLog\Tests\Functional\API;

use App\Containers\Vendor\ResponseLog\Facades\Container;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Permissions\Permissions;
use App\Containers\Vendor\ResponseLog\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

final class GetAllResponseLogTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::READ
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'get@v1/' . Container::getApiUri();
    }

    public function test(): void
    {
        $logs = ResponseLog::factory()
            ->count(4)
            ->create();

        $this->makeCall();

        $this->response->assertOk();

        $this->response->assertJson(
            fn(AssertableJson $json): AssertableJson => $json
                ->has('data', $logs->count())
                ->has('meta')
                ->where('meta.pagination.count', $logs->count())
                ->where('meta.pagination.total', $logs->count())
                ->etc()
        );
    }
}
