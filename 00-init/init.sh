#!/bin/bash

HOST_SOCKET="unix:///var/run/docker.sock"
DOCKER_HOST="127.0.0.1:2375"
CONTAINER_NAME='docker-host'
SHARED_DIR='/Users/silverfire/workshop'

docker="docker -H $HOST_SOCKET"

$docker start $CONTAINER_NAME 2>/dev/null || \
$docker run --privileged -d \
        --name $CONTAINER_NAME \
        -p $DOCKER_HOST:2375 \
        -p 2080-2099:2080-2099 \
        -v $SHARED_DIR:$SHARED_DIR \
        docker:dind --storage-driver=overlay2

echo "export DOCKER_HOST=${DOCKER_HOST}"
