<?php

namespace FitnessApp\Models;

final class WorkoutSession
{
    private int $id;
    private string $type;
    
    public function __construct(int $id, string $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
