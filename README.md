## User, Orders, and Payments Management System

### Prerequisites
- PHP 7.4+
- Composer
- Laravel 8+
- MySQL or any other supported database
- Git (optional)

## Installation Steps
1. Clone the Repository: `git clone https://github.com/yourusername/your-repo-name.git`
`cd your-repo-name`
2. Install Dependencies: `composer install`
3. Set Up Environment Variables:
- Update your .env file with database credentials
4. Run Migrations:
- Set up the database schema by running the migrations: `php artisan migrate`
5. Seed the Database (Optional):
- If you have seeders set up, you can populate the database with sample data: `php artisan db:seed`

## Data Import Functionality for Payments
Run the CSV Import Command:
- Use the Artisan command to import payment data from the CSV file: `php artisan import:payments storage/app/imports/payment.csv`
(Make sure you have the library installed to handle CSV operations, If not run this `composer require league/csv`)

To see user details, orders along with their payments,
`php artisan serve`

You can view user details, orders, and payments in a user-friendly and organized manner, ensuring an efficient and seamless user experience.

