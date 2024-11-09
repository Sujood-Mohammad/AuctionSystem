# Auction System

## Project Overview

This is an Auction System built with Laravel and Vue.js. The system allows two types of users:
1. **Seller**: Can create products and view offers submitted by buyers.
2. **Buyer**: Can view available products and submit price offers on them.

### Features

- **Authentication**: Users register as either a seller or a buyer and log in to access the application.
- **Products Page**: Displays all products for sale with filtering options (by seller name and product name). This page is built using Vue.js.
- **Create Product Page**: Sellers can create products with name, description, and image fields.
- **Price Offers**: Buyers can submit price offers on products, and sellers can view offers on their products.

### Technologies Used
- **Backend**: Laravel 9
- **Frontend**: Vue.js (for the products page)
- **Environment**: XAMPP with PHP 8.2
- **Database**: MySQL
- **Package Manager**: npm for managing frontend dependencies

## Setup Instructions

Follow these steps to set up and run the project locally.

### 1. Clone the Repository

First, clone the repository from GitHub:
```bash
git clone https://github.com/Sujood-Mohammad/auction_system.git
```
### 2. Move into the project directory
```bash
cd auction_system
```
### 3. Install the backend and frontend dependencies
```bash
composer install
npm install
```
### 4. Create a copy of the .env.example file and rename it to .env
```bash
cp .env.example .env
```
### 5. Generate the application key
```bash
php artisan key:generate
```
### 6. Update the database credentials in the .env file to match your MySQL setup
```bash
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
### 7. Run the Application
You can now start the backend server and the frontend development server:

Backend (Laravel Server): Run this command to start the Laravel development server:
```bash
php artisan migrate:fresh --seed
php artisan serve
```
Frontend (Vue Development Server): Use the following command to start the Vue.js development server:
```bash
npm run dev
```
### 8. Access the Application
Once both servers are running, you can access the application by opening http://localhost:8000 in your web browser.

