# Jane with two Symfony apps

Here is a demo of Jane interacting with two Symfony apps. A frontend and an API apps.

This README is a quick *Getting started* guide about theses application.

## Requirements

To make this application works you need:
- [docker](https://docs.docker.com/engine/install/)
- python >= 3.6
- [pipenv](https://pipenv.pypa.io/en/latest/install/#installing-pipenv)

## Bash environment

We are using pipenv to avoid installing libraries on your local machine.
To run your bash env you have to install it first: `pipenv install`.
Then you can use it either by doing `pipenv run {command}` or `pipenv shell` 
(first command will only run a given command while second will prompt you in a new shell).

## Start docker

To have all needed services (postgres, elasticsearch or kibana), we use docker. 
To make it start you can use `inv start` command.

Then you will need to have the demo app domain to your `/etc/hosts` as following:
```
127.0.0.1 api.between-two-apps-jane.test between-two-apps-jane.test
```

## Running the application

Now you need to install dependencies and setup database.
To do all this you have to run:

```bash
inv install # install dependencies (composer only for this app)
inv migrate fixtures # setup database and load fixtures
```

Now you can see all our data from Elasticsearch on https://elasticsearch-jane.test/beers 🎉

## And how Jane and both apps works together ?

@TODO

## Used libraries

In order to make this app, I used many libraries, here is a quick list of them:
- [jane-php/json-schema](https://github.com/janephp/janephp): Indeed, we are using it to generate models & normalizers
- [jane-php/automapper](https://github.com/janephp/janephp): Allows you to automap values from Class to Class (In our case from an entity to a DTO)
- [jolicode/elastically](https://github.com/jolicode/elastically): Elastica wrapper to bootstrap Elasticsearch PHP integration
- [jolicode/docker-starter](https://github.com/jolicode/docker-starter): Used to have a quick & efficient docker setup
- [symfony/*](https://github.com/symfony/symfony): And indeed, the framework we are using Symfony
