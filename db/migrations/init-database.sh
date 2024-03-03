#!/usr/bin/env bash

mysql -u root -proot portifolio < "/docker-entrypoint-initdb.d/001-create-tables.sql"

