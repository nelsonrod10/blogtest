

## About

This developmet was made for [square1](https://square1.io/), like a test to senior developer job position.

The principal points to be evaluated are:
-  Use PHP and Laravel Framework
-  Build a web blogging platform
- The homepage will show all the blog posts to everyone visiting the web.
- Any user will be able to register in the platform, login to a private area to see the posts he created and, if they want, create new ones. They won't be able to edit or delete them.
- The blog posts will only contain a title, description and publication date. The users should be able to sort them by publication_date.
-  Auto import the posts from REST api https://sq1-api-test.herokuapp.com/posts. The posts from this feed should be saved under a designated, system-created user, 'admin'.
- Minimise the strain put on our system during traffic peaks
- The output of the above project should be a git repository

## Main features

For the development I used:
- MySQL database.
- Laravel 7.x.
- Tailwindcss 1.4.
- Vue.js 2.5.
- Bouncer (Eloquent Authorization) 

## Heroku

If you like, you can see the project funcionality in http://squareblog.herokuapp.com/

## Clone or download

To clone or download please note:

- Make a .env file (See .env.example file ), and configure your database features
- Run php artisan migrate --seed. (run seeders for create a admin user)
- Admin user credentials: 
  - email -> nelsonrod10@gmail.com, 
  - password -> admin

## Contact.

nelsonrod10@gmail.com

Bogota - Colombia


