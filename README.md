# Laravel API Example Project

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-^8.2-blue)
![License](https://img.shields.io/badge/license-MIT-green)

A clean and simple RESTful API built with **Laravel** to demonstrate backend development practices.
This project showcases routing, database integration, and API structure, and is designed to be consumed by a sample frontend application.

---

## Features

-   Built with Laravel
-   RESTful API with CRUD operations
-   MySQL (or SQLite) database integration
-   Example frontend integration

---

## Tech Stack

-   **Backend**: Laravel, PHP
-   **Database**: MySQL (configurable)
-   **Tools**: Composer, Artisan, Docker

---

## Installation

Clone the repository:

```bash
git clone https://github.com/AlderF-dev/simple-taskboard-api.git
cd simple-taskboard-api
```

Install dependencies:

```bash
composer install
```

Start the local server:

```bash
docker compose up -d
```

Build Docker Container

```
docker build
```

Enter Docker Container

```
docker ps
docker exec -it **Container ID** sh
```

Copy the example environment file and configure database:

```bash
cp .env.example .env
php artisan key:generate
```

Run migrations:

```bash
php artisan migrate
```

API will be available at:
`http://localhost:8080/api`

---

## API Endpoints

| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| GET    | /api/tasks      | Get all tasks   |
| POST   | /api/tasks      | Create new task |
| PUT    | /api/tasks/{id} | Update an task  |
| DELETE | /api/tasks/{id} | Delete an task  |

---

## Frontend Integration

This API is consumed by a simple frontend project available here:
👉 [Frontend Repo Link](https://github.com/AlderF-dev/simple-taskboard)

---

## License

This project is open-source and available under the [MIT License](LICENSE).
