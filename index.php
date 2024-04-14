<?php
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__ . "\src\models\WorkoutSession.php");
require_once(__ROOT__ . "\src\\repositories\WorkoutSessionRepository.php");
require_once(__ROOT__ . "\src\\controllers\WorkoutSessionController.php");

use FitnessApp\Models\WorkoutSession;
use FitnessApp\Controllers\WorkoutSessionController;
use FitnessApp\Repositories\WorkoutSessionRepository;

$database = [
    new WorkoutSession(1, "running"),
    new WorkoutSession(2, "running"),
    new WorkoutSession(3, "cycling"),
    new WorkoutSession(4, "walking"),
    new WorkoutSession(5, "cycling"),
    new WorkoutSession(6, "walking"),
    new WorkoutSession(7, "running")
];


$workoutSessionRepository = new WorkoutSessionRepository($database);
$workoutSessionController = new WorkoutSessionController($workoutSessionRepository);

function runCLI($controller, $arguments)
{
    if ($arguments[1] === 'sessions') {
        if (isset($arguments[2])) {
            $sessionList = $controller->getSessionsListByType($arguments[2]);
            printSessions($sessionList);
            return;
        } else {
            $sessionList = $controller->getSessionsList();
            printSessions($sessionList);
        }
    } else {
        echo 'Usage: php index.php sessions';
        return;
    }
}

function printSessions($sessionList)
{
    foreach ($sessionList as $session) {
        echo $session;
    }
}

runCLI($workoutSessionController, $argv);
