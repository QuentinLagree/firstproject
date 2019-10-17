<?php


namespace App\Action;


use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

class UserAction implements ActionInterface
{
    /** @var PhpRenderer */
    private $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function action(ServerRequestInterface $request): ResponseInterface
    {
        return $this->renderer->render(new Response(), 'user.php', []);
    }
}