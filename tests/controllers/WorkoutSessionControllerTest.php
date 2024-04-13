<?php

use FitnessApp\Controllers\WorkoutSessionController;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\WorkoutSessionRepository;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionControllerTest extends TestCase
{
    private static WorkoutSessionRepository $mockRepository;

    public static function setUpBeforeClass(): void
    {
        $mockDatabase = [
            new WorkoutSession(1, "running"),
            new WorkoutSession(2, "running"),
        ];

        self::$mockRepository = new WorkoutSessionRepository($mockDatabase);
    }

    public function testReturnsSessionsList()
    {
        $controller = new WorkoutSessionController(self::$mockRepository);

        $expectedList = ["|id: 1 |type: running |" . PHP_EOL, "|id: 2 |type: running |" . PHP_EOL];

        $this->assertEquals($expectedList, $controller->getSessionsList());
    }
}
