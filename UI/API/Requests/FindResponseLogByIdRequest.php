<?php

/**
 * ERP system
 *
 * This file is part of the ERM system package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    Proprietary
 * @copyright  Copyright (C) zemlechist.ru, All rights reserved.
 * @link       https://zemlechist.ru
 */

namespace App\Containers\Vendor\ResponseLog\UI\API\Requests;

use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Ship\Traits\Request\HasInputId;

class FindResponseLogByIdRequest extends GetAllResponseLogRequest
{
    use HasInputId;

    protected array $decode = [
        ID
    ];

    protected array $urlParameters = [
        ID
    ];

    public function rules(): array
    {
        return [
            ID => [
                'required',
                'exists:' . ResponseLog::TABLE . ',' . ID
            ]
        ];
    }
}
