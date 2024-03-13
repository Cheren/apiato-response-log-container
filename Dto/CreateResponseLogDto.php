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

use App\Ship\Parents\Dto\Dto;
use Illuminate\Http\Request;
use Throwable;

class CreateResponseLogDto extends Dto
{
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
        $exception = $args[0]['exception'];

        $args[0]['code'] = (int)$exception->getCode();

        if ($args[0]['code'] === 0 && property_exists($exception, 'status')) {
            $args[0]['code'] = $exception->status;
        }

        $args[0]['exception'] = $exception::class;
        $args[0]['message'] = $exception->getMessage();

        if (method_exists($exception, 'getErrors')) {
            $args[0]['errors'] = $exception->getErrors();
        }

        if (method_exists($exception, 'errors')) {
            $args[0]['errors'] = $exception->errors();
        }

        $args[0]['file'] = $exception->getFile();
        $args[0]['line'] = $exception->getLine();
        $args[0]['trace'] = array_slice($exception->getTrace(),0, 15);
    }

    protected function requestToArrayData(&$args)
    {
        /** @var Request $request */
        $request = $args[0]['request'];

        $args[0]['ip_address'] = $request->ip();
        $args[0]['request'] = [
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
        return isset($args[0]['request']) && $args[0]['request'] instanceof Request;
    }

    protected function isExceptionAttr($args): bool
    {
        return isset($args[0]['exception']) && $args[0]['exception'] instanceof Throwable;
    }
}
