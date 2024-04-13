<?php 

namespace FitnessApp\Repositories;

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
        return array_filter($this->database, function ($session) use($type){
            return $session->getType() === $type;
        });
    }
}