<?php

use PHPUnit\Framework\TestCase;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\WorkoutSessionRepository;

final class WorkoutSessionRepositoryTest extends TestCase
{
    private static $mockDatabase;
    private static $repository;

    public static function setUpBeforeClass(): void
    {
        self::$mockDatabase = [
            new WorkoutSession(1, "running", 5.5),
            new WorkoutSession(2, "running", 4.2),
            new WorkoutSession(3, "cycling", 23.1),
            new WorkoutSession(4, "walking", 3.6),
            new WorkoutSession(5, "cycling", 40),
            new WorkoutSession(6, "walking", 5.1),
            new WorkoutSession(7, "running", 4.1)
        ];

        self::$repository = new WorkoutSessionRepository(self::$mockDatabase);
    }

    public function testGetsAllSessions()
    {
        $sessions = self::$repository->getAllSesssions();

        $expected = self::$mockDatabase;
        $this->assertEquals($expected, $sessions);
    }

    public function testGetsAllSessionsByType()
    {
        $sessions = self::$repository->getAllSesssionsByType("running");

        $expected = [
            new WorkoutSession(1, 'running', 5.5),
            new WorkoutSession(2, 'running', 4.2),
            new WorkoutSession(7, 'running', 4.1)
        ];
        $this->assertEqualsCanonicalizing($expected, $sessions);
    }
}
