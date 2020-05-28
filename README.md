==================
eventbrite-sdk-php
==================

[![Build Status](https://travis-ci.org/eventbrite/eventbrite-sdk-php.svg?branch=master)](https://travis-ci.org/eventbrite/eventbrite-sdk-php)
[![Latest Stable Version](https://poser.pugx.org/eventbrite/eventbrite-sdk-php/v/stable)](https://packagist.org/packages/eventbrite/eventbrite-sdk-php)
[![Total Downloads](https://poser.pugx.org/eventbrite/eventbrite-sdk-php/downloads)](https://packagist.org/packages/eventbrite/eventbrite-sdk-php)
[![License](https://poser.pugx.org/eden/eventbrite/license)](https://packagist.org/packages/eden/eventbrite)


* Official Eventbrite_ SDK for PHP
* API Reference: https://developer.eventbrite.com/docs/
* You can register an Eventbrite app at https://www.eventbrite.com/myaccount/apps/


Installation
------------
Clone the repo. Once this is public we can add version control and installation via composer.

The Eventbrite PHP SDK makes it easy to interact with the Eventbrite API:

```php
    use Eventbrite\HttpClient;
    ...
    $client = new HttpClient('TOKEN');
    $user = $client->get_user(1234567890);
    $user['id'];
    //1234567890
    $user['name'];
    //Serena Williams
```
You can also specify API endpoints manually:

```php

    $user = $client->get('/users/me/');
    $user['id'];
    //1234567890
    $user['name'];
    //Serena Williams
```
Contributing
------------

Bug reports and pull requests are welcome on GitHub at https://github.com/eventbrite/eventbrite-sdk-python.


License
-------

The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
