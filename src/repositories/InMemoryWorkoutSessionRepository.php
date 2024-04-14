<?php 

namespace FitnessApp\Repositories;

require_once(__ROOT__ . "\src\\abstracts\WorkoutSessionRepository.php");

use Exception;
use FitnessApp\Abstracts\WorkoutSessionRepository;

final class InMemoryWorkoutSessionRepository extends WorkoutSessionRepository
{
    public function getAllWorkoutSesssions()
    {
        return $this->database;
    }

    public function getWorkoutSesssionsOfType(string $type)
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