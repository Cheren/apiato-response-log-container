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

/**
 * @property-read mixed $id
 */
class FindResponseLogByIdRequest extends GetAllResponseLogRequest
{
    protected array $decode = [
        'id'
    ];

    protected array $urlParameters = [
        'id'
    ];

    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'exists:' . ResponseLog::TABLE . ',id'
            ]
        ];
    }
}
