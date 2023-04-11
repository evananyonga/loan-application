# Loan API 
The Loan API provides information about a customer’s loan status
## Getting Started

These instructions will give you a copy of the project up and running on
your local machine for development and testing purposes. See deployment
for notes on deploying the project on a live system.

### Prerequisites

Requirements for the software and other tools to build, test and push.

#### Using local dependencies
- [composer](https://getcomposer.org/)
- [node](https://nodejs.org/en/)
- [php v8.0](https://www.php.net/downloads.php)
- [mysql v8.0](https://dev.mysql.com/downloads/installer/)
- [larvel v8.4](https://laravel.com/docs/8.x/installation)
### Installation

A step by step guide to get a development environment running  

1. Fork the main company repo to make a copy for your self

2. Clone the forked repo
```
git clone https://github.com/<your-username>/loan-application.git
```
3. Change into project directory
```
cd loan-application
```
4. prepare env file
```
cp .env.example .env

#### Installing
5. Create Database
```   
CREATE DATABASE DATABASE_NAME;
```
6. Update .env with database details
```   
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DATABASE_NAME>
DB_USERNAME=<DB_USERNAME>
DB_PASSWORD=<DB_PASSWORD>
```
7. startup the system
```  
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
8. Access the system via
    http://localhost:8000 or http://127.0.0.1:8000