<?php

/**
 * YouBM application system.
 *
 * This file is part of the YouBM application system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license YouBM license.
 * @copyright Copyright (C) YouBM.ru, All rights reserved.
 * @link https://youbm.ru
 */

namespace App\Containers\Vendor\ResponseLog\Actions;

use App\Containers\Vendor\ResponseLog\Tasks\DeleteResponseLogsEarlyForTask;
use App\Ship\Parents\Actions\Action;

class DeleteResponseLogsEarlyForAction extends Action
{
    public function run(int $days = DeleteResponseLogsEarlyForTask::DEFAULT_DAYS)
    {
        return app(DeleteResponseLogsEarlyForTask::class)->run($days);
    }
}
