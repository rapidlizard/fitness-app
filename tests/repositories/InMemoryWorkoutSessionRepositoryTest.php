<?php

use PHPUnit\Framework\TestCase;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\InMemoryWorkoutSessionRepository;

final class InMemoryWorkoutSessionRepositoryTest extends TestCase
{
    private static $mockDatabase;
    private static $repository;

    public static function setUpBeforeClass(): void
    {
        self::$mockDatabase = [
            new WorkoutSession(1, "running", 5.5, new DateInterval("PT35M")),
            new WorkoutSession(2, "running", 4.2, new DateInterval("PT27M")),
            new WorkoutSession(3, "cycling", 23.1, new DateInterval("PT38M")),
            new WorkoutSession(4, "walking", 3.6, new DateInterval("PT55M")),
            new WorkoutSession(5, "cycling", 40, new DateInterval("PT1H5M")),
            new WorkoutSession(6, "walking", 5.1, new DateInterval("PT45M")),
            new WorkoutSession(7, "running", 4.1, new DateInterval("PT30M"))
        ];

        self::$repository = new InMemoryWorkoutSessionRepository(self::$mockDatabase);
    }

    public function testGetsAllSessions()
    {
        $sessions = self::$repository->getAllWorkoutSesssions();

        $expected = self::$mockDatabase;
        $this->assertEquals($expected, $sessions);
    }

    public function testGetsAllSessionsByType()
    {
        $sessions = self::$repository->getWorkoutSesssionsOfType("running");

        $expected = [
            new WorkoutSession(1, "running", 5.5, new DateInterval("PT35M")),
            new WorkoutSession(2, "running", 4.2, new DateInterval("PT27M")),
            new WorkoutSession(7, "running", 4.1, new DateInterval("PT30M"))
        ];
        $this->assertEqualsCanonicalizing($expected, $sessions);
    }

    public function testThrowsExceptionWhenTypeCannotBeFound()
    {
        $incorrectType = "foo";

        $this->expectExceptionMessage("Sessions of type {$incorrectType} not found");

        self::$repository->getWorkoutSesssionsOfType($incorrectType);
    }
}
