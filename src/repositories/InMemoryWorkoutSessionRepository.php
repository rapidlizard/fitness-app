<?php 

namespace FitnessApp\Repositories;

use Exception;
use FitnessApp\Abstracts\WorkoutSessionRepository;

final class InMemoryWorkoutSessionRepository extends WorkoutSessionRepository
{
    public function getAllWorkoutSessions()
    {
        return $this->database;
    }

    public function getWorkoutSessionsOfType(string $type)
    {
        $sessions = array_filter($this->database, function ($session) use($type){
            return $session->getType() === $type;
        });

        if (count($sessions) === 0) {
            throw new Exception("Sessions of type {$type} not found");
        }

        return $sessions;
    }
}