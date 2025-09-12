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

use Apiato\Core\Contracts\HasResourceKey;
use App\Containers\Vendor\ResponseLog\Data\Factories\ResponseLogFactory;
use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog as BaseResponseLog;
use App\Ship\Database\Casts\JSON as JsonCast;
use App\Ship\Parents\Models\Model;
use App\Ship\Traits\Model\IsNumbered;
use Illuminate\Support\Carbon;
use JBZoo\Data\JSON;

/**
 * @property-read int $id Уникальны идентификатор.
 * @property-read string $ip_address IP адрес.
 * @property-read int $code Код ошибки.
 * @property-read string $exception Название исключения.
 * @property-read string $message Сообщение об ошибке.
 * @property-read JSON $errors Список ошибок (В основном при валидации).
 * @property-read null|string $file Файл где произошла ошибка.
 * @property-read null|string $line Строка где произошла ошибка.
 * @property-read JSON $trace Отслеждивание ошибки.
 * @property-read JSON $request Данные запроса.
 * @property-read null|Carbon $created_at Дата и время моздания.
 * @property-read null|Carbon $updated_at Дата и время обновления.
 *
 * @method static ResponseLogFactory factory(...$parameters)
 */
final class ResponseLog extends Model implements HasResourceKey
{
    use IsNumbered;

    public const TABLE = 'response_logs';
    public const RESOURCE_KEY = 'ResponseLog';

    protected $table = self::TABLE;
    protected string $resourceKey = self::RESOURCE_KEY;

    protected $fillable = [
        BaseResponseLog::IP_ADDRESS,
        BaseResponseLog::CODE,
        BaseResponseLog::EXCEPTION,
        BaseResponseLog::MESSAGE,
        BaseResponseLog::ERRORS,
        BaseResponseLog::FILE,
        BaseResponseLog::LINE,
        BaseResponseLog::TRACE,
        BaseResponseLog::REQUEST
    ];

    protected $casts = [
        BaseResponseLog::ERRORS => JsonCast::class,
        BaseResponseLog::TRACE => JsonCast::class,
        BaseResponseLog::REQUEST => JsonCast::class
    ];
}
