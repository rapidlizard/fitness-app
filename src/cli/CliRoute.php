<?php

namespace FitnessApp\Cli;

use Exception;

final class CliRoute
{
    public function __construct(string $route, array $argv, callable $callback)
    {
        $requestedRoute = $this->getRequestedRoute($argv);
        $parameter = $this->getParameter($argv);

        if ($requestedRoute === $route) {
            $callback($parameter);
        }
    }

    private function getRequestedRoute($argv)
    {
        if (!array_key_exists(1, $argv)) {
            throw new Exception("No route was provided");
        }
        return $argv[1];
    }

    private function getParameter($argv)
    {
        if (!array_key_exists(2, $argv)) {
            return;
        }
        return $argv[2];
    }
}
