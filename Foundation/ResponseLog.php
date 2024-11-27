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

namespace App\Containers\Vendor\ResponseLog\Foundation;

use App\Ship\Foundation\SectionContainer;

final class ResponseLog extends SectionContainer
{
    public const CODE = 'code';
    public const ERRORS = 'errors';
    public const EXCEPTION = 'exception';
    public const FILE = 'file';
    public const IP_ADDRESS = 'ip_address';
    public const LINE = 'line';
    public const MESSAGE = 'message';
    public const REQUEST = 'request';
    public const TRACE = 'trace';

    protected string $apiBaseUri = 'response-logs';
}
