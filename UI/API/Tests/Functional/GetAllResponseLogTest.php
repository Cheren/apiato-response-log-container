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

namespace App\Containers\Vendor\ResponseLog\UI\API\Tests\Functional;

use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Tests\ApiTestCase;
use Illuminate\Http\Response;

final class GetAllResponseLogTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/response-logs';

    public function test(): void
    {
        $total = 4;

        ResponseLog::factory()
            ->count($total)
            ->create();

        $response = $this->makeCall();

        $response->assertStatus(Response::HTTP_OK);

        $data = $this->getResponseContentObject();

        $this->assertCount($total, $data->data);
        $this->assertSame($total, $data->meta->pagination->count);
        $this->assertSame($total, $data->meta->pagination->total);
    }
}
