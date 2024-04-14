<?php

use FitnessApp\Controllers\WorkoutSessionController;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\WorkoutSessionRepository;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionControllerTest extends TestCase
{
    private static WorkoutSessionController $controller;

    public static function setUpBeforeClass(): void
    {
        $mockDatabase = [
            new WorkoutSession(1, "running"),
            new WorkoutSession(2, "running"),
            new WorkoutSession(3, "cycling"),
        ];

        $mockRepository = new WorkoutSessionRepository($mockDatabase);
        self::$controller = new WorkoutSessionController($mockRepository);
    }

    public function testGetsSessionsList()
    {
        $list = self::$controller->getSessionsList();

        $expectedList = [
            "|id: 1 |type: running |" . PHP_EOL, 
            "|id: 2 |type: running |" . PHP_EOL,
            "|id: 3 |type: cycling |" . PHP_EOL,
        ];
        $this->assertEquals($expectedList, $list);
    }

    public function testGetsSessionsListByType()
    {
        $filteredList = self::$controller->getSessionsListByType("running");

        $expectedList = ["|id: 1 |type: running |" . PHP_EOL, "|id: 2 |type: running |" . PHP_EOL];
        $this->assertEquals($expectedList, $filteredList);
    }

    public function testThrowsExceptionWhenTypeCannotBeFound()
    {
        $incorrectType = "foo";

        $this->expectExceptionMessage("ERROR: Sessions of type {$incorrectType} not found");

        self::$controller->getSessionsListByType($incorrectType);
    }
}
