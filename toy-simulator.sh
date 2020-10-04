#!/bin/bash

# Author : Syed Shoaib Abidi
# Script follows here:

if [ "$1" == "test" ]; then
  docker exec -it php-cli bash -c "php application test"
elif [ "$1" == "simulate-robot" ] && [ -n "$2" ]; then
  docker exec php-cli bash -c "php application simulate-robot $2"
elif [ "$1" == "simulate-robot" ]; then
  docker exec php-cli bash -c "php application simulate-robot"
fi
