# Engage

## Project URLS

- [GitHub Readme](https://github.com/trinitymirror/engage/blob/master/README.md)
- [Continuous Integration](https://codeship.com/projects/79191/)
- [Local](http://localhost/engage/web/)
- [QA](http://staging.engage.trinitymirror.com)
- [Production](http://engage.trinitymirror.com)

## Development Targets

- IE10+
- Safari (recent -1)
- Chrome (recent -1)
- Firefox (recent -1)
- Android Chrome (recent -1)

## On-boarding – Getting Started

The section assumes you have GIT, Apache, PHP, PHP Composer, MySQl and Grunt set up. You may need to adjust as needed for your local development system.

### Install

Clone this repository into your development area:

```
git clone https://github.com/trinitymirror/engage.git engage
cd engage
```

Inside the engage folder install the dependencies using Composer:

```
composer install
```

### Set up WordPress

Install the development database via Sequel Pro or PHPMyAdmin. Visit `http://localhost/engage/web` to access the site.

### Testing Your Changes

Our test suite is run on every commit pushed to this repository.

### Updating WordPress and Plugins

To upgrade to the latest PATCH versions of WordPress or its plugins run `composer update` from your command line.

Upgrading to a MAJOR or MINOR version you will need to manually update `require` and `require-dev` sections of the `composer.json` file and run `composer update`.

After testing the new version(s) commit the updated `composer.json` and `composer.lock` files back the the repository for deployment.

### Making Your Changes

Make your changes locally on a new branch based off `origin/master`. Push your changes to this repository to perform our tests.

### Deploying to our Staging Server

Once our tests are passed, create a pull request to merge into our `develop` branch. After approval and merging this will be deployed to our staging server.

### Deploying to our Live Server

If you are happy with your changes. Create a pull request to merge your original branch into `master` (not `develop`). On merge this will start the deployment process to our live server.

## Documentation

During the Alpha/Beta stages, due to constant changes, documentation will be mainly written in-line. With a dedicated section being created at the first major release.

## Reporting Issues

If you spot any issues please create a ticket via GitHub's Issue Tracker. including the issue, the browser and operating system, and how to replicate it. If the issue is security related please use the contact information below.

## Contributing to this project

In lieu of a formal style guide, take care to maintain the existing coding style.

## Contact

Trinity Mirror Creative - [tmcreative@trinitymirror.com](tmcreative@trinitymirror.com)

## Copyright

Unless otherwise stated © Trinity Mirror. All rights reserved.
