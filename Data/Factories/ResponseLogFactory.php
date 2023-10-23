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

use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Ship\Parents\Factories\Factory;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Collection|ResponseLog create($attributes = [], ?Model $parent = null)
 */
final class ResponseLogFactory extends Factory
{
    protected $model = ResponseLog::class;

    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4,
            'code' => 200,
            'exception' => Exception::class,
            'message' => $this->faker->text,
            'errors' => [],
            'file' => null,
            'line' => null,
            'trace' => [],
            'request' => [],
        ];
    }
}
