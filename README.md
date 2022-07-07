# Tree walker

Simple app to walk through tree and adding name property.

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/)
2. Run `docker-compose up -d`
3. Run `docker exec -it php bash`, next `cd app/` and run `composer install`
4. pen `https://localhost` in your favorite web browser
5. Run `docker-compose down` to stop the Docker containers.

## Input data 
 - valid json file contain tree (tree.json)
 - valid json file contain list with attributes (list.json)

## Result
The result will be shown on screen and write to file (result.json)
