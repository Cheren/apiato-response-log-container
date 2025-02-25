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

namespace App\Containers\Vendor\ResponseLog\UI\API\Transformers;

use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;

final class AdminResponseLogTransformer extends ResponseLogTransformer
{
    public function transform(ResponseLogModel $responseLog): array
    {
        return parent::transform($responseLog) +
            [
                $this->realKey(ID) => $responseLog->id
            ];
    }
}
