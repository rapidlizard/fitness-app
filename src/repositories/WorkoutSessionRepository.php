<?php 

namespace FitnessApp\Repositories;

use Exception;

final class WorkoutSessionRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getAllSesssions()
    {
        return $this->database;
    }

    public function getAllSesssionsByType(string $type)
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