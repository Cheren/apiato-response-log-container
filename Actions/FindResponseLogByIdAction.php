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

namespace App\Containers\Vendor\ResponseLog\Actions;

use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Containers\Vendor\ResponseLog\Tasks\FindResponseLogByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Exceptions\NotFoundException;

class FindResponseLogByIdAction extends Action
{
    /**
     * @param int $id
     * @return ResponseLog
     * @throws NotFoundException
     */
    public function run(int $id): ResponseLog
    {
        return app(FindResponseLogByIdTask::class)->run($id);
    }
}
