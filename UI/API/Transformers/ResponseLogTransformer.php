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

namespace App\Containers\Vendor\ResponseLog\UI\API\Transformers;

use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Ship\Parents\Transformers\Transformer;

class ResponseLogTransformer extends Transformer
{
    public function transform(ResponseLogModel $responseLog): array
    {
        return [
            OBJECT => $responseLog->getResourceKey(),
            ID => $responseLog->getHashedKey(),
            ResponseLog::IP_ADDRESS => $responseLog->ip_address,
            ResponseLog::CODE => $responseLog->code,
            ResponseLog::EXCEPTION => $responseLog->exception,
            ResponseLog::MESSAGE => $responseLog->message,
            ResponseLog::ERRORS => $responseLog->errors,
            ResponseLog::FILE => $responseLog->file,
            ResponseLog::LINE => $responseLog->line,
            ResponseLog::TRACE => $responseLog->trace,
            ResponseLog::REQUEST => $responseLog->request,
            CREATED_AT => $this->nullOrTimestamp($responseLog->created_at),
            UPDATED_AT => $this->nullOrTimestamp($responseLog->updated_at)
        ];
    }
}
