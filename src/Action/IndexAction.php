<?php

namespace App\Action;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

/**
 * Class IndexAction
 * @package App\Action
 * 
 * This class is an action
 */
class IndexAction implements ActionInterface
{
    /** @var PhpRenderer */
    private $renderer;

    /**
     * IndexAction constructor.
     * @param PhpRenderer $renderer
     */
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param ServerRequestInterface $request
     * 
     * @return ResponseInterface
     */
    public function action(ServerRequestInterface $request): ResponseInterface
    {
        $name = $request->getQueryParams()['nom'] ?? null;

        return $this->renderer->render(new Response(), 'index.php', [
            'name' => $name
        ]);
    }
}