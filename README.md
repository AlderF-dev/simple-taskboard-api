# Laravel API Example Project

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-^8.2-blue)
![License](https://img.shields.io/badge/license-MIT-green)

---

## Why This Project

This project was created as a **backend showcase** to demonstrate my ability to design and implement RESTful APIs using **Laravel 12**.
It highlights clean architecture, structured routing, database design, and controller logic following Laravel best practices.
The goal is to provide a solid and maintainable backend that cleanly integrates with a modern frontend built in **React + TypeScript**, showcasing a complete full-stack workflow.

Key focuses:

-   RESTful API design principles
-   Database migrations, models, and relationships
-   Clear and consistent route definitions
-   Scalable structure ready for authentication and advanced features
-   Easy integration with external clients (frontend apps or Postman)

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
