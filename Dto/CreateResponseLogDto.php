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

namespace App\Containers\Vendor\ResponseLog\Dto;

use App\Containers\Vendor\ResponseLog\Foundation\ResponseLog;
use App\Ship\Contracts\ToData;
use App\Ship\Parents\Dto\Dto;
use App\Ship\Traits\DtoToData;
use Illuminate\Http\Request;
use Throwable;

class CreateResponseLogDto extends Dto implements ToData
{
    use DtoToData;

    public string $ip_address;
    public int $code;
    public string $exception;
    public string $message;
    public array $errors = [];
    public ?string $file;
    public ?int $line;
    public array $trace = [];
    public array $request = [];

    public function __construct(...$args)
    {
        if ($this->isRequestAttr($args)) {
            $this->requestToArrayData($args);
        }

        if ($this->isExceptionAttr($args)) {
            $this->setAttrsByException($args);
        }

        parent::__construct(...$args);
    }

    protected function setAttrsByException(&$args)
    {
        /** @var Throwable $exception */
        $exception = $args[ZERO][ResponseLog::EXCEPTION];

        $args[ZERO][ResponseLog::CODE] = (int)$exception->getCode();

        if ($args[ZERO][ResponseLog::CODE] === ZERO && property_exists($exception, 'status')) {
            $args[ZERO][ResponseLog::CODE] = $exception->status;
        }

        $args[ZERO][ResponseLog::EXCEPTION] = $exception::class;
        $args[ZERO][ResponseLog::MESSAGE] = $exception->getMessage();

        if (method_exists($exception, 'getErrors')) {
            $args[ZERO]['errors'] = $exception->getErrors();
        }

        if (method_exists($exception, 'errors')) {
            $args[ZERO]['errors'] = $exception->errors();
        }

        $args[ZERO][ResponseLog::FILE] = $exception->getFile();
        $args[ZERO][ResponseLog::LINE] = $exception->getLine();
        $args[ZERO][ResponseLog::TRACE] = array_slice($exception->getTrace(), ZERO, 10);
    }

    protected function requestToArrayData(&$args)
    {
        /** @var Request $request */
        $request = $args[ZERO]['request'];

        $args[ZERO][ResponseLog::IP_ADDRESS] = $request->ip();
        $args[ZERO][ResponseLog::REQUEST] = [
            'method' => $request->getMethod(),
            'attributes' => $request->attributes->all(),
            'request' => $request->request->all(),
            'query' => $request->query->all(),
            'cookies' => $request->cookies->all(),
            'headers' => $request->headers->all(),
            'content' => $request->getContent(),
            'baseUrl' => $request->getBaseUrl(),
        ];
    }

    protected function isRequestAttr($args): bool
    {
        return isset($args[ZERO][ResponseLog::REQUEST]) && $args[ZERO][ResponseLog::REQUEST] instanceof Request;
    }

    protected function isExceptionAttr($args): bool
    {
        return isset($args[ZERO][ResponseLog::EXCEPTION]) && $args[ZERO][ResponseLog::EXCEPTION] instanceof Throwable;
    }
}
