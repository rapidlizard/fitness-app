<?php

namespace FitnessApp\Models;

final class WorkoutSession
{
    private int $id;
    private string $type;
    private float $distance;
    
    public function __construct(int $id, string $type, float $distance)
    {
        $this->id = $id;
        $this->type = $type;
        $this->distance = $distance;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDistance(): string
    {
        return $this->distance;
    }
}
