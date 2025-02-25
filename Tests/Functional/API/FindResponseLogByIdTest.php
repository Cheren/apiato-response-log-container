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

namespace App\Containers\Vendor\ResponseLog\Tests\Functional\API;

use App\Containers\Vendor\ResponseLog\Facades\Container;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Permissions\Permissions;
use App\Containers\Vendor\ResponseLog\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

final class FindResponseLogByIdTest extends ApiTestCase
{
    protected array $access = [
        PERMISSIONS => Permissions::READ
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->endpoint = 'get@v1/' . Container::getApiUri('{' . ID . '}');
    }

    public function testSuccess(): void
    {
        $responseLog = ResponseLog::factory()->create();

        $this
            ->injectId($responseLog->id)
            ->makeCall();

        $this->response->assertOk();

        $this->response->assertJson(
            fn(AssertableJson $json): AssertableJson => $json
                ->has('data')
                ->where('data.' . OBJECT, ResponseLog::RESOURCE_KEY)
                ->where('data.' . ID, $responseLog->getHashedKey())
                ->etc()
        );
    }

    public function testNotFind(): void
    {
        $this
            ->injectId(555)
            ->makeCall();

        $this->assertGivenDataWasInvalid();
    }
}
