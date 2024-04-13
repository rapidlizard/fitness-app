<?php

namespace FitnessApp\Controllers;

use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\WorkoutSessionRepository;

final class WorkoutSessionController
{
    private $repository;

    public function __construct(WorkoutSessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getSessionsList()
    {
        $sessions = $this->repository->getAllSesssions();

        $list = [];
        foreach($sessions as $session) {
            array_push($list, $this->printSession($session));
        }

        return $list;
    }
    
    private function printSession(WorkoutSession $session)
    {
        return "|id: {$session->getId()} |type: {$session->getType()} |" . PHP_EOL;
    }
}