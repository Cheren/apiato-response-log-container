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

namespace App\Containers\Vendor\ResponseLog\Actions;

use App\Containers\Vendor\ResponseLog\Dto\CreateResponseLogDto;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Tasks\CreateResponseLogTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\CreateResourceFailedException;

class CreateResponseLogAction extends Action
{
    /**
     * @param CreateResponseLogDto $dto
     * @return ResponseLog
     * @throws CreateResourceFailedException
     */
    public function run(CreateResponseLogDto $dto): ResponseLog
    {
        return app(CreateResponseLogTask::class)->run($dto);
    }
}
