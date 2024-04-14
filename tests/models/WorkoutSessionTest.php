<?php

use FitnessApp\Models\WorkoutSession;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionTest extends TestCase
{

    private static WorkoutSession $session;

    public static function setUpBeforeClass(): void
    {
        $id = 1;
        $type = "running";
        $distance = 20.5;
        $elapsedTime = new DateInterval("PT30M");

        self::$session = new WorkoutSession($id, $type, $distance, $elapsedTime);
    }

    public function testReturnsId()
    {
        $this->assertEquals(1, self::$session->getId());
    }

    public function testReturnsType()
    {
        $this->assertEquals("running", self::$session->getType());
    }

    public function testReturnsDistance()
    {
        $this->assertEquals(20.5, self::$session->getDistance());
    }

    public function testReturnsElapsedTime()
    {
        $this->assertEquals(new DateInterval("PT30M"), self::$session->getElapsedTime());
    }
}