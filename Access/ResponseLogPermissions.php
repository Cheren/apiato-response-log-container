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

namespace App\Containers\Vendor\ResponseLog\Access;

use App\Ship\Access\Permission;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class ResponseLogPermissions extends Permission
{
    public const READ = 'vendor-response-log-read';

    /**
     * @return Collection
     * @throws UnknownProperties
     */
    public function getList(): Collection
    {

        return collect([
            $this->createPermissionDto(self::READ, [
                'display_name' => $this->getTranslateKey('read.name'),
                'description' => $this->getTranslateKey('read.description')
            ])
        ]);
    }

    public function getSection(): string
    {
        return 'vendor';
    }

    public function getContainer(): string
    {
        return 'responseLog';
    }
}
