<?php

namespace FitnessApp\Controllers;

use Exception;
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

        if (count($sessions) === 0) {
            throw new Exception("Sessions of type {$type} not found");
        }

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