<?php

use FitnessApp\Controllers\WorkoutSessionController;
use FitnessApp\Models\WorkoutSession;
use FitnessApp\Repositories\InMemoryWorkoutSessionRepository;
use FitnessApp\Repositories\WorkoutSessionRepository;
use PHPUnit\Framework\TestCase;

final class WorkoutSessionControllerTest extends TestCase
{
    private static WorkoutSessionController $controller;

    public static function setUpBeforeClass(): void
    {
        $mockDatabase = [
            new WorkoutSession(1, "running", 2.2, new DateInterval("P30M")),
            new WorkoutSession(2, "running", 1.3, new DateInterval("P10M")),
            new WorkoutSession(3, "cycling", 5, new DateInterval("P20M")),
        ];

        $mockRepository = new InMemoryWorkoutSessionRepository($mockDatabase);
        self::$controller = new WorkoutSessionController($mockRepository);
    }

    public function testGetsSessionsList()
    {
        $list = self::$controller->getSessionsList();

        $expectedList = [
            "|id: 1 |type: running |distance: 2.2 |" . PHP_EOL, 
            "|id: 2 |type: running |distance: 1.3 |" . PHP_EOL,
            "|id: 3 |type: cycling |distance: 5 |" . PHP_EOL,
        ];
        $this->assertEquals($expectedList, $list);
    }

    public function testGetsSessionsListByType()
    {
        $filteredList = self::$controller->getSessionsListByType("running");

        $expectedList = ["|id: 1 |type: running |distance: 2.2 |" . PHP_EOL, "|id: 2 |type: running |distance: 1.3 |" . PHP_EOL];
        $this->assertEquals($expectedList, $filteredList);
    }

    public function testGetsTotalDistanceForSessionsOfType()
    {
        $type = "running";
        $totalDistance = self::$controller->getTotalDistanceOfSessionType($type);

        $expectedDistance = "Total running distance: 3.5km";
        $this->assertEquals($expectedDistance, $totalDistance);
    }
}
