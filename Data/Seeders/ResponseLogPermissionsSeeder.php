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

namespace App\Containers\Vendor\ResponseLog\Data\Seeders;

use App\Containers\Vendor\ResponseLog\Permissions\Permissions;
use App\Ship\Seeders\PermissionsSeeder;

final class ResponseLogPermissionsSeeder extends PermissionsSeeder
{
    protected ?string $permissionClass = Permissions::class;
}
