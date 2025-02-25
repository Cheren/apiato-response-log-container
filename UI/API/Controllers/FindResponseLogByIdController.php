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

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\Vendor\ResponseLog\Actions\FindResponseLogByIdAction;
use App\Containers\Vendor\ResponseLog\UI\API\Requests\FindResponseLogByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class FindResponseLogByIdController extends ApiController
{
    /**
     * @param FindResponseLogByIdRequest $request
     * @param FindResponseLogByIdAction $action
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindResponseLogByIdRequest $request, FindResponseLogByIdAction $action): JsonResponse
    {
        return $this->json(
            $this->transform(
                $action->run($request->getId()),
                $request->getTransformer()
            )
        );
    }
}
