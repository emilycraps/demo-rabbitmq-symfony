#RabbitMQ demo in Symfony, using commands

**RabbitMQ** https://www.rabbitmq.com/

**simple bus** hhttps://github.com/SimpleBus

##Setup

`$ composer install`

## Run demo
This demo uses docker and docker-compose.

`$ docker-compose up`

You can access the RabbitMQ management plugin at http://rabbit.symfony.docker/. Default login is guest / guest.

###Confirm Order example
Demonstrates the most simple example: 1 exchange, 1 queue, 1 consumer.

Publish a message  
`$ docker-compose run --rm web bin/console app:send-confirmation-mail -u3 -o4`

Start consumer  
`$ docker-compose run --rm web bin/console rabbitmq:consume asynchronous_commands`
