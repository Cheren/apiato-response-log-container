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

namespace App\Containers\Vendor\ResponseLog\Permissions;

use App\Containers\AppSection\Authorization\Permission\Schema\PermissionsCollection;
use App\Ship\Access\PermissionsSchema as ShipPermissionsSchema;

final class PermissionsSchema extends ShipPermissionsSchema
{
    /**
     * @return PermissionsCollection
     */
    public function schema(): PermissionsCollection
    {
        $this->addSimplePermissionSchema(Permissions::READ);
        return $this->permissionsSchema;
    }
}
