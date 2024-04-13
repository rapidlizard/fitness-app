# Fitness app

Business model:

```
class WorkoutSession 
{
    id: int 
    type: WorkoutType
    elapsedTime: DateTime
    date: DateTime
    distance: int
}
```

I chose the name ```WorkoutSession``` because I'm using Apples fitness app as a reference. We can imagine the data coming from the Users smart watch with the data: ```elapsedTime: DateTime``` & ```distance: int```, with the ```date: DateTime``` and ```id: int``` being created the moment it is being saved to the database.

## Project structure:

Going for a simple structure at the beginning to keep things simple. Just one model and repository and controller to accompany it.

The DB is in memory, using just a simple ```WorkoutSessions[]``` array. 

```
src
├── models
|   └── WorkoutSession.php
├── repositories
|   └── WorkoutSessionRepository.php
├── controllers
|   └── WorkoutSessionController.php
index.php
```

## Tech stack:
- PHP 8
- Composer
- PHPUnit
- Leaf

Choosing Leaf incase I have time to make it into a REST API. It's lightweight and performant. Given the simplicity of this project, I think this works for me perfectly as it requires minimal code and setup.

I'm using https://phptherightway.com for reference on best practices.

## TODO: 
Taken from the PDF
- [ ] ```GetAllWorkoutSessions()```. Retrieve and display all ```WorkoutSession``` recorded by users (at the moment there are no users so we are imagining all sessions belong to a single user). 

- [ ] ```GetAllWorkoutSessionsOfType($type)```. Retrieve and filter all ```WorkoutSession``` by type.

- [ ] ```GetTotalDistanceForWorkoutSessionsOfType($type)```: Retrieve and filter all ```WorkoutSession``` by type and sum all the ```distance```

- [ ] ```GetTotalElapsedTimeForWorkoutSessionsOfType($type)```: Retrieve and filter all ```WorkoutSession``` by type and sum all the ```elapsedTime```

## Setup
To install dependencies run:
```
> composer install
```

To run all tests:
```
> ./vendor/bin/phpunit tests
```

To run the application:
```
> php index.php
```


<!-- ## Notes: 
- [ ] DB in index, injected into repo then repo injected into controller 
- [ ] I want to inject the ```WorkoutSessionRepository``` into the controller so the controller will depend on a ```Repository``` interface.
- [ ] The repository depends on an Array for a database. Reads and writes to this array. 
- [ ] Implement Leaf to expose methods via REST API -->
