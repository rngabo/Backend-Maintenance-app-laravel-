# Laravel Streetlight Maintenance App
This is a Laravel-based application that analyzes and displays useful information for streetlight maintenance using a JSON API file containing streetlight data information. The application uses various analytical tools and algorithms to display information such as faulty streetlights, energy usage, and more.

# Requirements

PHP 7.2+
Laravel 5.8+
MySQL or any other database of your choice
Installation
Clone the repository to your local machine using the command git clone https://github.com/<username>/<repository-name>.git
Navigate to the project directory using the command cd <repository-name>
Install the required packages using the command composer install
Create a .env file and configure the database settings
Run the migration files using the command php artisan migrate
Seed the database using the command php artisan db:seed

# Usage

Run the server using the command php artisan serve
Navigate to localhost:8000 on your browser to access the application
Use the application to analyze and display useful information for streetlight maintenance.
Notifications
The application sends notifications to the relevant authorities via email or SMS for any maintenance issues. You can configure the notification settings in the .env file.

# Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

License
MIT
