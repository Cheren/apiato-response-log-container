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

namespace App\Containers\Vendor\ResponseLog\Data\Factories;

use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Ship\Parents\Factories\Factory;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Collection|ResponseLogModel create($attributes = [], ?Model $parent = null)
 */
final class ResponseLogFactory extends Factory
{
    protected $model = ResponseLogModel::class;

    public function definition(): array
    {
        return [
            ResponseLog::IP_ADDRESS => $this->faker->ipv4,
            ResponseLog::CODE => 200,
            ResponseLog::EXCEPTION => Exception::class,
            ResponseLog::MESSAGE => $this->faker->text,
            ResponseLog::ERRORS => [],
            ResponseLog::FILE => null,
            ResponseLog::LINE => null,
            ResponseLog::TRACE => [],
            ResponseLog::REQUEST => [],
        ];
    }
}
