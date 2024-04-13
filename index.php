<?php
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__."\src\models\WorkoutSession.php");
require_once(__ROOT__."\src\\repositories\WorkoutSessionRepository.php");

use FitnessApp\Repositories\WorkoutSessionRepository;
use FitnessApp\Models\WorkoutSession;

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
$sessions = $workoutSessionRepository->getAllSesssions();

function printSession(WorkoutSession $session)
{
    return "|id: {$session->getId()} |type: {$session->getType()} |" . PHP_EOL;
}

foreach ($sessions as $session) {
    echo printSession($session);
}
