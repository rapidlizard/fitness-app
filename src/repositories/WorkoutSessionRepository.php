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
}