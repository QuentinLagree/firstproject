<?php


namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ActionInterface
{
    public function action(ServerRequestInterface $request): ResponseInterface;
}