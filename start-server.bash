#!/bin/bash
docker run -i -t -p "80:8069" -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql mattrayner/lamp:latest