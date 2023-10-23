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

namespace App\Containers\Vendor\ResponseLog\Tasks;

use App\Containers\Vendor\ResponseLog\Dto\CreateResponseLogDto;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Ship\Exceptions\CreateResourceFailedException;
use Exception;

class CreateResponseLogTask extends ResponseLogTask
{
    /**
     * @param CreateResponseLogDto $dto
     * @return ResponseLog
     * @throws CreateResourceFailedException
     */
    public function run(CreateResponseLogDto $dto): ResponseLog
    {
        try {
            return $this->repository->create($dto->toArray());
        } catch (Exception $exception) {
            throw new CreateResourceFailedException($exception->getMessage());
        }
    }
}
