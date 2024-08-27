## User, Orders, and Payments Management System
This is Users, Orders, and Payments Management System using Laravel,introducing three main entities: Users, Orders, and Payments. Each user can have multiple orders, and
each order can have multiple payments.

### Prerequisites
- PHP 8.3
- Composer
- Laravel 9
- MySQL or any other supported database
- Git (optional)

## Installation Steps
1. Clone the Repository: `git clone https://github.com/yourusername/your-repo-name.git` , navigate to
`cd your-repo-name`
2. Install Dependencies: `composer install`
3. Set Up Environment Variables: Update your .env file with database credentials
5. Run Migrations: Set up the database schema by running the migrations
   `php artisan migrate`
6. Seed the Database (Optional): You can populate the database with sample data
   `php artisan db:seed`

## Data Import Functionality for Payments
- Created a new command to import data from a CSV file.
- The CSV file have the following columns:
user_id,user_name,user_email,order_id,order_number,order_total_amount,order_created_at,payment_id,payment_amount,payment_method,payment_date,payment_created_at
- Validated the data before inserting it into the database.
- Output the result of the import, showing how many payments were imported and how many were skipped.
- Run the CSV Import Command: Use the Artisan command to import payment data from the CSV file
  `php artisan import:payments storage/app/imports/payment.csv`
(Make sure you have the library installed to handle CSV operations, If not run this `composer require league/csv`)


To see user details, orders along with their payments, you need to run laravel application.
`php artisan serve`

You can view user details, orders, and payments in a user-friendly and organized manner, ensuring an efficient and seamless user experience.

