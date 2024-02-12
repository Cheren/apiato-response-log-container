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

namespace App\Containers\Vendor\ResponseLog\UI\API\Tests\Functional;

use App\Containers\Vendor\ResponseLog\Access\ResponseLogPermissions;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Tests\ApiTestCase;
use Illuminate\Http\Response;

class FindResponseLogByIdTest extends ApiTestCase
{
    protected array $access = [
        'permissions' => ResponseLogPermissions::READ
    ];

    protected string $endpoint = 'get@v1/response-logs/{id}';

    public function testSuccess(): void
    {
        $responseLog = ResponseLog::factory()->create();

        $response = $this->injectId($responseLog->id)->makeCall();
        $response->assertStatus(Response::HTTP_OK);

        $this->assertResponseContainKeyValue([
            'object' => ResponseLog::RESOURCE_KEY,
            'id' => $responseLog->getHashedKey()
        ]);
    }

    public function testNotFind()
    {
        $response = $this->injectId(555)->makeCall();
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
