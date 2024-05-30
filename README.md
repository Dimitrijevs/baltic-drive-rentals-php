# Baltic Drive Rentals 🚗

Welcome to Baltic Drive Rentals! Your go-to car sharing service in the Baltic states 🌍. Explore our affordable and flexible car rental options today. 🚀

## Features 🌟
- 📅 Rent for a day or as long as you want.
- 💰 Starting at just 30 euros/day.
- 🚙 Diverse fleet for all your adventures.
- 🌐 Easy online booking.
- 🆘 24/7 customer support.
- 🔒 Safe and well-maintained vehicles.

## How It Works 🚀
1. 📝 Create an account.
2. 🚗 Pick your ride.
3. 💳 Confirm and pay.
4. 🏁 Go!

## Contact Us 📞
Got questions? Reach out to us!
- ✉️ Email: [support@balticdrive.com](mailto:support@balticdrive.com)
- ☎️ Phone: +371 12345678
- 📍 Address: 123 Baltic Drive, Baltic City, Baltic State 🏙️

Start your Baltic adventure with Baltic Drive Rentals today! 🌟🚗💨

### Used Technologies

- Vue 3
- Bootstrap 5 (Bootswatch)
- Laravel 10
- Inertia
- GitHub

## Setup Instructions

### Prerequisites

Before getting started, make sure you have the following installed on your system:

- [PHP](https://www.php.net/) (>= 8.0)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (>= 18.x)
- [NPM](https://www.npmjs.com/) (usually comes with Node.js)

### Steps to Setup

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Dimitrijevs/baltic-drive-rentals-php.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd baltic-drive-rentals-php
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Install Node.js dependencies:**

    ```bash
    npm install
    ```

5. **Create a copy of the .env.example file and rename it to .env:**

    ```bash
    cp .env.example .env
    ```

6. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

7. **Run database migrations and seed (if needed):**

    ```bash
    php artisan migrate:fresh && php artisan db:seed --class=MainSeeder
    ```

8. **Generate a symbolic link from "public/storage" to "storage/app/public":**

    ```bash
    php artisan storage:link
    ```

9. **Download car images from the following link and copy them to the storage directory:**

    [Car Images](https://drive.google.com/drive/folders/1pshFUYUZQtL1rWHarsRaohzd6HTDpq_1?usp=sharing)

    After downloading, extract the images and copy the folder to: `baltic-drive-rentals-php/storage/app/public/`

10. **Start the development server:**

    ```bash
    php artisan serve
    ```

11. **Compile assets (JavaScript, CSS, etc.):**

    ```bash
    npm run dev
    ```

    Your application will be available at `http://localhost:8000`.

12. **Visit the application in your browser:**

    Open your web browser and navigate to `http://localhost:8000`.

That's it! You should now have the project set up and running locally on your machine.
