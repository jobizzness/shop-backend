# Dockerfile extending the generic PHP image with application files for a
# single application.
FROM gcr.io/google-appengine/php:latest

RUN apt-get update -y && apt-get install -y -q php-mongodb

# The Docker image will configure the document root according to this
# environment variable.
ENV DOCUMENT_ROOT /app/public
