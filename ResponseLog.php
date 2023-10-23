<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license     https://kalistratov.ru/licenses/erp Proprietary license
 * @copyright   Copyright (C) kalistratov.ru, All rights reserved ©.
 * @link        https://kalistratov.ru
 * @author      Sergey Kalistratov <sergey@kalistratov.ru>
 */

namespace App\Containers\Vendor\ResponseLog;

use App\Containers\Vendor\ResponseLog\Actions\CreateResponseLogAction;
use App\Containers\Vendor\ResponseLog\Dto\CreateResponseLogDto;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ResponseLog
{
    /**
     * @param array $args
     * @return ResponseLogModel
     * @throws CreateResourceFailedException
     * @throws UnknownProperties
     */
    public function write(array $args): ResponseLogModel
    {
        $dto = new CreateResponseLogDto($args);
        return app(CreateResponseLogAction::class)->run($dto);
    }
}
