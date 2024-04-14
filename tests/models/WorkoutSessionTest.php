<?php

use FitnessApp\Models\WorkoutSession;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionTest extends TestCase
{
    public function testReturnsId()
    {
        $id = 1;
        $type = 'running';
        $distance = 20.5;
        $session = new WorkoutSession($id, $type, $distance);

        $this->assertEquals($id, $session->getId());
    }

    public function testReturnsType()
    {
        $id = 1;
        $type = 'running';
        $distance = 20.5;
        $session = new WorkoutSession($id, $type, $distance);

        $this->assertEquals($type, $session->getType());
    }

    public function testReturnsDistance()
    {
        $id = 1;
        $type = 'running';
        $distance = 20.5;
        $session = new WorkoutSession($id, $type, $distance);

        $this->assertEquals($distance, $session->getDistance());
    }
}