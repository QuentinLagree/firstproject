<?php

namespace App;

use App\Action\ActionInterface;
use Slim\Views\PhpRenderer;

class Router
{

    /** @var PhpRenderer */
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function match(string $path): ?ActionInterface
    {
        switch ($path) {
            case '/':
                $action = new \App\Action\IndexAction($this->renderer);
                break;

            case '/user':
                $action = new \App\Action\UserAction($this->renderer);
                break;

            default:
                $action = null;
                break;
        }

        return $action;
    }
}