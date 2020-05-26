FROM postgres:12.3-alpine

ENV POSTGRES_USER=testuser
ENV POSTGRES_DB=testdb
ENV POSTGRES_PASSWORD=test

COPY ./database.sql /docker-entrypoint-initdb.d/
