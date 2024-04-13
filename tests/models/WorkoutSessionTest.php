<?php

use FitnessApp\Models\WorkoutSession;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionTest extends TestCase
{
    public function testReturnsId()
    {
        $id = 1;
        $type = 'running';
        $session = new WorkoutSession($id, $type);

        $this->assertEquals($id, $session->getId());
    }

    public function testReturnsType()
    {
        $id = 1;
        $type = 'running';
        $session = new WorkoutSession($id, $type);

        $this->assertEquals($type, $session->getType());
    }
}