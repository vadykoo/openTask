<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

##About
Project - simple task manager API similar to Trello

##How to run
`composer install`

Create .env file and set up the name of mysql db and mongodb

`php artisan key:generate`

required need to comment observers in Providers/AppServiceProvider.php
before running seeders 

`php artisan migrate --seed`

`php artisan storage:link`

`php arisan serve`

For asynchronous jobs you need to set 
`QUEUE_CONNECTION=database` in .env file
and run

`php artisan queue:work`

You can import the documentation file in postman public /docs/collection.json or open docs in browser localhost/docs

````
Your task is to develop a REST API task application (like Trello).
You need to create user authorization.
The user can create and update boards.
The user can attach a task to each board.
The user can create custom labels, then he can attach multiple labels to the task.
The task must have a status (backlog, development, done, review).
We can filter tasks by labels, status.
The user can attach an image to the task (the image must be cropped into 2 formats: desktop, mobile). Image cropping must be asynchronous. (http://image.intervention.io/).
We need to keep logs in MongoDB table “logs” for each update of task (create, update, delete). Who made the change, when, and what was changed (use https://github.com/jenssegers/laravel-mongodb).

Use: Laravel 8.0, MySQL, MongoDB.
Use policies https://laravel.com/docs/7.x/authorization#creating-policies
Use api resources/collections - https://laravel.com/docs/7.x/eloquent-resources
Use pagination in index endpoints

Advanced (optional)

You should have 2 image drivers (for cropping), you should choose a second driver. In config we will have image_driver = ‘intervention’ or another driver. And we can change the image driver in env file. 
Task should have relation with 1 user. 
You should have an endpoint for boards statistics (BoardsCollection):
Total tasks. 
Total tasks which are done.
Progress in percentage. 
The best user of the week. (The user who has completed most of the tasks).
````