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

namespace App\Containers\Vendor\ResponseLog\UI\API\Controllers;

use App\Containers\Vendor\ResponseLog\Actions\GetAllResponseLogsAction;
use App\Containers\Vendor\ResponseLog\UI\API\Requests\GetAllResponseLogRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Apiato\Core\Exceptions\InvalidTransformerException;

class Controller extends ApiController
{
    /**
     * @param GetAllResponseLogRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     */
    public function getAllResponseLogs(GetAllResponseLogRequest $request): JsonResponse
    {
        $responseLogs = app(GetAllResponseLogsAction::class)->run();
        return $this->json($this->transform($responseLogs, $request->getTransformer()));
    }
}
