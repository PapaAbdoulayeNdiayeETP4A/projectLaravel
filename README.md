# Project Laravel

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## Introduction
Welcome to the Project Laravel! This project is a web application built using the Laravel framework. It aims to provide a robust and scalable solution for [describe the purpose of your project].

## Features
- Feature 1: [Description of feature 1]
- Feature 2: [Description of feature 2]
- Feature 3: [Description of feature 3]

## Installation
To get a local copy up and running, follow these simple steps.

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & npm

### Steps
1. Clone the repository
    ```sh
    git clone git@github.com:PapaAbdoulayeNdiayeETP4A/projectLaravel.git
    ```
2. Navigate to the project directory
    ```sh
    cd projectLaravel
    ```
3. Install dependencies
    ```sh
    composer install
    npm install
    ```
4. Modify the `.env` file for database connection
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=smartphone_db
    DB_USERNAME=root
    DB_PASSWORD=
    DB_COLLATION=utf8mb4_unicode_ci
    ```
5. Create the database on PhpMyAdmin

6. Run migration
    ```sh
    php artisan migrate
    ```

7. Seed the database with db.json file
    ```sh
    php artisan db:seed --class=SmartphoneSeeder
    ```
8. Compile tailwind
    ```sh
    npm run dev
    ```

9. In another terminal, run the server
    ```sh
    php artisan serve
    ```

## Usage
Provide instructions and examples for using the project. Here are some commands you might find useful:
- `php artisan serve`: Start the development server
- `php artisan migrate`: Run the database migrations
- `php artisan make:model ModelName`: Create a new Eloquent model
- `php artisan db:seed --class=SmartphoneSeeder`: Seed the database using class specified
- `npm install`: install node dependencies

## Contributing
Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Add all modified files for your next commit (`git add .`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
Distributed under the MIT License. See `LICENSE` for more information.

## Contact
Papa Abdoulaye Ndiaye - [abdoulayendiaye10000@gmail.com](mailto:abdoulayendiaye10000@gmail.com)

Project Link: [https://github.com/PapaAbdoulayeNdiayeETP4A/projectLaravel](https://github.com/PapaAbdoulayeNdiayeETP4A/projectLaravel)