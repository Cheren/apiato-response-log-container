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

namespace App\Containers\Vendor\ResponseLog\Models;

use App\Containers\Vendor\ResponseLog\Data\Factories\ResponseLogFactory;
use App\Ship\Database\Casts\JSON as JsonCast;
use App\Ship\Parents\Models\Model;
use Illuminate\Support\Carbon;
use JBZoo\Data\JSON;

/**
 * @property-read int $id
 * @property-read string $ip_address
 * @property-read int $code
 * @property-read string $exception
 * @property-read string $message
 * @property-read JSON $errors
 * @property-read null|string $file
 * @property-read null|string $line
 * @property-read JSON $trace
 * @property-read JSON $request
 * @property-read null|Carbon $created_at
 * @property-read null|Carbon $updated_at
 *
 * @method static ResponseLogFactory factory(...$parameters)
 */
final class ResponseLog extends Model
{
    public const TABLE = 'response_logs';
    public const RESOURCE_KEY = 'ResponseLog';

    protected $table = self::TABLE;
    protected string $resourceKey = self::RESOURCE_KEY;

    protected $fillable = [
        'ip_address',
        'code',
        'exception',
        'message',
        'errors',
        'file',
        'line',
        'trace',
        'request'
    ];

    protected $casts = [
        'errors' => JsonCast::class,
        'trace' => JsonCast::class,
        'request' => JsonCast::class
    ];
}
