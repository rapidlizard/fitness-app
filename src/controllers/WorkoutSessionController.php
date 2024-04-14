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
            array_push($list, $this->createSessionEntry($session));
        }

        return $list;
    }

    public function getSessionsListByType(string $type)
    {
        $sessions = $this->repository->getAllSesssionsByType($type);

        $list = [];
        foreach($sessions as $session) {
            array_push($list, $this->createSessionEntry($session));
        }

        return $list;
    }
    
    private function createSessionEntry(WorkoutSession $session)
    {
        return "|id: {$session->getId()} |type: {$session->getType()} |" . PHP_EOL;
    }
}