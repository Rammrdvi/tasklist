# Laravel Task Management Project

This project is a simple task management application built with **Laravel** and styled using **Tailwind CSS**. The main goal of this project is to manage tasks (without using controllers) where tasks can be created, updated, marked as completed or not, and styled accordingly.

## Features

- **Add Tasks**: You can add tasks with a title, description, and long description.
- **Mark as Completed**: Tasks can be marked as completed or not completed.
- **Simple Interface**: Fully styled with **Tailwind CSS** for a clean and responsive UI.

## Installation

Follow these steps to set up the project on your local machine:

1. Clone this repository to your local environment:
    ```bash
    git clone https://github.com/Rammrdvi/tasklist.git
    ```

2. Navigate to the project directory:
    ```bash
    cd <your-repo-name>
    ```

3. Install all the required dependencies:
    ```bash
    composer install
    npm install
    ```

4. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Set up your database in the `.env` file:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

7. Run the database migrations:
    ```bash
    php artisan migrate
    ```

8. Compile the front-end assets:
    ```bash
    npm run dev
    ```

9. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

1. Navigate to the application homepage.
2. Add tasks with a title, description, and long description.
3. Mark tasks as **completed** or **not completed** using the toggle button.
4. Task status is updated dynamically.

## Technologies Used

- **Laravel**: The PHP framework used for backend task management.
- **Tailwind CSS**: The utility-first CSS framework used for the UI.
- **MySQL**: The database used for storing tasks.

## License

This project is open-sourced under the [MIT license](LICENSE).

## Contribution

Feel free to fork this repository, submit issues, and create pull requests.

---

