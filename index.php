<?php
require __DIR__ . '/vendor/autoload.php';

use FitnessApp\Cli\CliRoute;
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

new CliRoute("get-sessions", $argv, function ($type) use($workoutSessionController) {
    echo "exec get-sessions".PHP_EOL;
    if ($type) {
        $sessionList = $workoutSessionController->getSessionsListByType($type);
        printSessionsList($sessionList);
        return;
    }
    $sessionList = $workoutSessionController->getSessionsList();
    printSessionsList($sessionList);
    return;
});

new CliRoute("get-total-distance", $argv, function ($type) use($workoutSessionController) {
    echo "exec get-total-distance".PHP_EOL;
    if (!$type) {
        throw new Exception("No type of workout was provided");
        return;
    }
    echo $workoutSessionController->getTotalDistanceOfSessionType($type);
    return;
});

new CliRoute("get-total-time", $argv, function ($type) use($workoutSessionController) {
    echo "exec get-total-time".PHP_EOL;
    if (!$type) {
        throw new Exception("No type of workout was provided");
        return;
    }
    echo $workoutSessionController->getTotalDistanceOfSessionType($type);
    return;
});

echo "Usage:" . PHP_EOL .
        "php index.php get-sessions <type>" . PHP_EOL .
        "php index.php get-total-distance <type>" . PHP_EOL .
        "php index.php get-total-time <type>";


function printSessionsList($sessionList)
{
    foreach ($sessionList as $session) {
        echo $session;
    }
}
