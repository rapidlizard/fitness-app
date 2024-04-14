<?php
require __DIR__ . '/vendor/autoload.php';

use FitnessApp\Models\WorkoutSession;
use FitnessApp\Controllers\WorkoutSessionController;
use FitnessApp\Repositories\InMemoryWorkoutSessionRepository;

$database = [
    new WorkoutSession(1, "running", 5.5, new DateInterval("PT35M")),
    new WorkoutSession(2, "running", 4.2, new DateInterval("PT27M")),
    new WorkoutSession(3, "cycling", 23.1, new DateInterval("PT38M")),
    new WorkoutSession(4, "walking", 3.6, new DateInterval("PT55M")),
    new WorkoutSession(5, "cycling", 40, new DateInterval("PT15M")),
    new WorkoutSession(6, "walking", 5.1, new DateInterval("PT45M")),
    new WorkoutSession(7, "running", 4.1, new DateInterval("PT30M"))
];

$workoutSessionRepository = new InMemoryWorkoutSessionRepository($database);
$workoutSessionController = new WorkoutSessionController($workoutSessionRepository);

function runCLI($controller, $arguments)
{
    echo $arguments[1] . PHP_EOL;
    if ($arguments[1] === "get-sessions") {
        if (isset($arguments[2])) {
            $sessionList = $controller->getSessionsListByType($arguments[2]);
            printSessionsList($sessionList);
            return;
        } else {
            $sessionList = $controller->getSessionsList();
            printSessionsList($sessionList);
            return;
        }
    } else if ($arguments[1] === "get-total-distance") {
        echo $controller->getTotalDistanceOfSessionType($arguments[2]);
    } else {
        echo "Usage:" . PHP_EOL .
            "php index.php get-sessions <WorkoutType>" . PHP_EOL .
            "php index.php get-total-distance <WorkoutType>";
        return;
    }
}

function printSessionsList($sessionList)
{
    foreach ($sessionList as $session) {
        echo $session;
    }
}

runCLI($workoutSessionController, $argv);
