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

use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Containers\Vendor\ResponseLog\Models\ResponseLog as ResponseLogModel;
use App\Ship\Database\Migrations\CreateSchemaTable;
use App\Ship\Database\Migrations\CreateTableMigration;
use Illuminate\Database\Schema\Blueprint;

return new class extends CreateTableMigration
{
    public function addTableColumns(Blueprint $table): CreateSchemaTable
    {
        $table->id();
        $table->ipAddress();
        $table->unsignedInteger(ResponseLog::CODE);
        $table->string(ResponseLog::EXCEPTION);
        $table->text(ResponseLog::MESSAGE);
        $table->longText(ResponseLog::ERRORS);
        $table->string(ResponseLog::FILE)->nullable();
        $table->integer(ResponseLog::LINE)->nullable();
        $table->longText(ResponseLog::TRACE);
        $table->longText(ResponseLog::REQUEST)->nullable();
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
        return ResponseLogModel::TABLE;
    }
};
