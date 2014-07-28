# Bridge Getting Started Guide

The steps below should get you up and running with a live web app that
makes Bridge queries with minimal setup.

## Prerequisites

This demo uses Heroku.  Make sure you have walked through Heroku's
[PHP Getting Started Guide](https://devcenter.heroku.com/articles/getting-started-with-php) 
before proceeding.  At a minimum you should validate that you have the
Heroku Toolbelt installed and have created the Hello World app.

## Create a Wurl API Application

Register as a developer and create an application.  Follow the steps in 
[Getting Started](http://developers.wurl.com/pages/guides/getting-started).

Once you have completed these steps, you will need your access token for
the subsequent step below.

## Checkout the sample code

TBD - Steps to clone the repo

## Create a Heroku Application

In the sample code directory you just checked out, create a Heroku
application.

    heroku create

Now push the sample code:

    git push heroku master

Set your access token as a configuration variable

    heroku config:set WURL_ACCESS_TOKEN=your-access-token

Open the app

    heroku open



