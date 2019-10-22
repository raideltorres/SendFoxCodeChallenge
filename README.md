# Send Fox Code Challenge

* Problem: We’ve been wanting to migrate our email editor to one with more flexibility for long run, thinking using Facebook's Draft.js would best.  We need your help and this is a realistic project you’d work on at SendFox and Sumo Group.

* Goal: Create a simple Email editor using Laravel and React + Draft.js

    * Create a fresh Laravel app via composer.
    * Setup Bootstrap 4 CSS framework.
    * Setup Laravel's built in user authentication.
    * Using React and Draft.js, create a simple email editor form with "Subject" and "Body" fields.  User should be able to apply basic rich text editing to the "Content" field such as
    italic, bold, and underline.  The form should be able to save to a database.  Also don't forget field validation with relevant error messages. This page should only be accessible to logged in users.
    * Without using React, create a simple tabular page with pagination which lists the emails created via the above editor.  This page should only be accessible to logged in users.
    * Provide a clear README with instructions on how to setup and run the app.
    * Set up a live link and the GitHub repository that we can pull from and test.

-----
## Installation Guide:

* [Step 1: Download the Repository](#step1)
* [Step 2: Install Dependencies](#step2)
* [Step 3: Create the Database](#step3)
* [Step 4: Run the project](#step4)

-----
<a name="step1"></a>
### Step 1: Download the Repository

Clone the repository using git clone: `git clone https://github.com/raideltorres/SendFoxCodeChallenge.git`

-----
<a name="step2"></a>
### Step 2: Install dependencies

* Move to the project folder
* Run `composer install` for laravel
* Run `npm install` for react

-----
<a name="step3"></a>
### Step 3: Create the Database (We will be using mysql)

* Install mysql
* Create a new schema for the project
* Config the .env file using the .env.example and replace the db config
* Get the migrations in place by running `php artisan migrate`

-----
<a name="step4"></a>
### Step 4: Run the project

* In the project folder run `php artisan serve`
