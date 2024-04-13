<?php

use PHPUnit\Framework\TestCase;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\WorkoutSessionRepository;

final class WorkoutSessionRepositoryTest extends TestCase
{
    private static $mockDatabase = [];

    public static function setUpBeforeClass(): void
    {
        self::$mockDatabase = [
            new WorkoutSession(1, 'running'),
            new WorkoutSession(2, 'running'),
            new WorkoutSession(3, 'cycling'),
            new WorkoutSession(4, 'walking'),
            new WorkoutSession(5, 'cycling'),
            new WorkoutSession(6, 'walking'),
            new WorkoutSession(7, 'running')
        ];
    }

    public function testGetsAllSessions()
    {
        $repository = new WorkoutSessionRepository(self::$mockDatabase);
        $sessions = $repository->getAllSesssions();

        $expected = self::$mockDatabase;
        $this->assertEquals($expected, $sessions);
    }
}
