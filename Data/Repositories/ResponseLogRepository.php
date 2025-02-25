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

namespace App\Containers\Vendor\ResponseLog\Data\Repositories;

use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLog;
use App\Ship\Parents\Repositories\Repository;

final class ResponseLogRepository extends Repository
{
    public function model(): string
    {
        return ResponseLog::class;
    }
}
