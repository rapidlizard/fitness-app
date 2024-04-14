<?php 

namespace FitnessApp\Abstracts;

abstract class WorkoutSessionRepository
{
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    abstract public function getAllWorkoutSessions();

    abstract public function getWorkoutSessionsOfType(string $type);
}