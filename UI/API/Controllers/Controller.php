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

use App\Containers\Vendor\ResponseLog\Actions\FindResponseLogByIdAction;
use App\Containers\Vendor\ResponseLog\Actions\GetAllResponseLogsAction;
use App\Containers\Vendor\ResponseLog\UI\API\Requests\FindResponseLogByIdRequest;
use App\Containers\Vendor\ResponseLog\UI\API\Requests\GetAllResponseLogRequest;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Exceptions\NotFoundException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use Apiato\Core\Exceptions\CoreInternalErrorException;
use Prettus\Repository\Exceptions\RepositoryException;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    /**
     * @param GetAllResponseLogRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllResponseLogs(GetAllResponseLogRequest $request): JsonResponse
    {
        $responseLogs = app(GetAllResponseLogsAction::class)->run();
        return $this->json($this->transform($responseLogs, $request->getTransformer()));
    }

    /**
     * @param FindResponseLogByIdRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findResponseLogById(FindResponseLogByIdRequest $request): JsonResponse
    {
        $responseLog = app(FindResponseLogByIdAction::class)->run((int)$request->id);
        return $this->json($this->transform($responseLog, $request->getTransformer()));
    }
}
