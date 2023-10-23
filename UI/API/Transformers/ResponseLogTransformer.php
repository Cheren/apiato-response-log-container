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

use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Ship\Parents\Transformers\Transformer;

final class ResponseLogTransformer extends Transformer
{
    public function transform(ResponseLog $responseLog): array
    {
        $response = [
            'object' => $responseLog->getResourceKey(),
            'id' => $responseLog->getHashedKey(),
            'ip_address' => $responseLog->ip_address,
            'code' => $responseLog->code,
            'exception' => $responseLog->exception,
            'message' => $responseLog->message,
            'errors' => $responseLog->errors,
            'files' => $responseLog->files,
            'line' => $responseLog->line,
            'trace' => $responseLog->trace,
            'request' => $responseLog->request,
            'created_at' => $this->nullOrTimestamp($responseLog->created_at),
            'updated_at' => $this->nullOrTimestamp($responseLog->updated_at)
        ];

        return $this->ifAdmin($this->transformIfAdmin($responseLog), $response);
    }

    protected function transformIfAdmin(ResponseLog $responseLog): array
    {
        return [
            'real_id' => $responseLog->id
        ];
    }
}
