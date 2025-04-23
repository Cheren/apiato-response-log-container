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

namespace App\Containers\Vendor\ResponseLog\Tasks;

use Illuminate\Support\Carbon;

class DeleteResponseLogsEarlyForTask extends ResponseLogTask
{
    public const DEFAULT_DAYS = 7;

    public function run(int $days = self::DEFAULT_DAYS): int
    {
        $date = Carbon::now()->subDays($days);

        return $this->repository
            ->deleteWhere([
                [CREATED_AT, '<=', $date]
            ]);
    }
}
