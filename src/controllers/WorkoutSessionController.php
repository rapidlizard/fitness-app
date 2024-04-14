<?php

namespace FitnessApp\Controllers;

use DateInterval;
use DateTime;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Abstracts\WorkoutSessionRepository;

final class WorkoutSessionController
{
    private $repository;

    public function __construct(WorkoutSessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getSessionsList()
    {
        $sessions = $this->repository->getAllWorkoutSessions();

        $list = [];
        foreach($sessions as $session) {
            array_push($list, $this->createSessionEntry($session));
        }

        return $list;
    }

    public function getSessionsListByType(string $type)
    {
        $sessions = $this->repository->getWorkoutSessionsOfType($type);

        $list = [];
        foreach($sessions as $session) {
            array_push($list, $this->createSessionEntry($session));
        }

        return $list;
    }

    public function getTotalDistanceOfSessionType(string $type)
    {
        $sessions = $this->repository->getWorkoutSessionsOfType($type);

        $totalDistance = 0;
        foreach($sessions as $session) {
            $totalDistance += $session->getDistance();
        }

        return "Total {$type} distance: {$totalDistance}km";
    }

    public function getTotalElapsedTimeOfSessionsType(string $type)
    {
        $sessions = $this->repository->getWorkoutSessionsOfType($type);

        $totalTime = new DateTime("00:00");
        $referenceTime = clone $totalTime;
        foreach($sessions as $session) {
            $totalTime->add($session->getElapsedTime());
        }

        return "Total {$type} time: {$totalTime->diff($referenceTime)->i}m";
    }
    
    private function createSessionEntry(WorkoutSession $session)
    {
        return "|id: {$session->getId()} |type: {$session->getType()} |distance: {$session->getDistance()} |duration: {$session->getElapsedTime()->i}m |" . PHP_EOL;
    }
}