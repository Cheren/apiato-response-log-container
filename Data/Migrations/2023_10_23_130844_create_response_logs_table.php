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

// @codingStandardsIgnoreStart

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog;
use App\Ship\Database\Migrations\CreateTableMigration;
use App\Ship\Database\Migrations\CreateSchemaTable;
class CreateResponseLogsTable extends CreateTableMigration
{
    public function addTableColumns(Blueprint $table): CreateSchemaTable
    {
        $table->id();
        $table->ipAddress('ip_address');
        $table->unsignedInteger('code');
        $table->string('exception');
        $table->text('message');
        $table->longText('errors');
        $table->string('file')->nullable();
        $table->integer('line')->nullable();
        $table->longText('trace');
        $table->longText('request')->nullable();
        $table->timestamps();

        return $this;
    }

    public function addTableColumnsForeign(Blueprint $table): CreateSchemaTable
    {
        return $this;
    }

    public function addTableColumnsIndex(Blueprint $table): CreateSchemaTable
    {
        return $this;
    }

    public function getTableName(): string
    {
        return ResponseLog::TABLE;
    }
}
