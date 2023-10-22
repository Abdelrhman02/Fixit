<?php

namespace App\Core;

use App\Controllers;


class Router
{
    private array $get = [];
    private array $post = [];

    /**
     * @return Router
     */
    public static function make(): Router
    {
        return new self();
    }

    public function get(string $uri, string $action): static
    {
        $this->get[$uri] = $action;
        return $this;
    }

    public function post(string $uri, string $action): static
    {
        $this->post[$uri] = $action;
        return $this;
    }


    public function resolve($uri, $method): void
    {
        if (array_key_exists($uri, $this->{$method})) {
            $action = $this->{$method}[$uri];
            $this->callAction(...$action);
        } else {
            redirect(home());
        }
    }


    protected function callAction($controller, $action): void
    {

        $controller = new $controller();
        $controller->{$action}();

    }
}
