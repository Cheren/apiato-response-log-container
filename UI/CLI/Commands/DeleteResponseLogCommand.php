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

namespace App\Containers\Vendor\ResponseLog\UI\CLI\Commands;

use App\Containers\Vendor\ResponseLog\Actions\DeleteResponseLogsEarlyForAction;
use App\Containers\Vendor\ResponseLog\Facades\Container;
use App\Containers\Vendor\ResponseLog\Tasks\DeleteResponseLogsEarlyForTask;
use App\Ship\Parents\Commands\ConsoleCommand;
use Symfony\Component\Console\Input\InputOption;

class DeleteResponseLogCommand extends ConsoleCommand
{
    protected $signature = 'vendor:response-log:delete';

    public function __construct()
    {
        $this->description = Container::trans('container.command.delete.description');
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption(
            'early_for',
            null,
            InputOption::VALUE_OPTIONAL,
            Container::trans('container.command.delete.early_for'),
            DeleteResponseLogsEarlyForTask::DEFAULT_DAYS
        );
    }

    public function handle(): void
    {
        $result = app(DeleteResponseLogsEarlyForAction::class)->run();

        if ($result === ZERO) {
            $this->info(Container::trans('container.command.delete.no_data_to_delete'));
        } else {
            $this->info(Container::trans('container.command.delete.result', [
                'total' => $result
            ]));
        }
    }
}
