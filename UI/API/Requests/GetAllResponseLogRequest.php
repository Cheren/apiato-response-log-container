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

namespace App\Containers\Vendor\ResponseLog\UI\API\Requests;

use App\Containers\Vendor\ResponseLog\Permissions\Permissions;
use App\Containers\Vendor\ResponseLog\UI\API\Transformers\ResponseLogTransformer;
use App\Ship\Contracts\GettableTransformer;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Requests\ApiRequest;

class GetAllResponseLogRequest extends ApiRequest implements GettableTransformer
{
    protected array $access = [
        'permissions' => Permissions::READ
    ];

    public function getTransformer(): Transformer
    {
        return new ResponseLogTransformer();
    }
}
