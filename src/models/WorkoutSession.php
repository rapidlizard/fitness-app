<?php

namespace FitnessApp\Models;

use DateInterval;

final class WorkoutSession
{
    private int $id;
    private string $type;
    private float $distance;
    private DateInterval $elapsedTime;
    
    public function __construct(int $id, string $type, float $distance, DateInterval $elapsedTime)
    {
        $this->id = $id;
        $this->type = $type;
        $this->distance = $distance;
        $this->elapsedTime = $elapsedTime;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function getElapsedTime(): DateInterval
    {
        return $this->elapsedTime;
    }
}
