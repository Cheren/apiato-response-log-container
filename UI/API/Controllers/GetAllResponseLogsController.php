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

namespace App\Containers\Vendor\ResponseLog\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\ResponseLog\Actions\GetAllResponseLogsAction;
use App\Containers\Vendor\ResponseLog\UI\API\Requests\GetAllResponseLogRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllResponseLogsController extends ApiController
{
    /**
     * @param GetAllResponseLogRequest $request
     * @param GetAllResponseLogsAction $action
     * @return JsonResponse
     * @throws CoreInternalErrorException
     * @throws InvalidTransformerException
     * @throws RepositoryException
     */
    public function __invoke(GetAllResponseLogRequest $request, GetAllResponseLogsAction $action): JsonResponse
    {
        return $this->json(
            $this->transform(
                $action->run(),
                $request->getTransformer()
            )
        );
    }
}
