# CodeIgniter 4 Backend

Backend API built with CodeIgniter 4 framework for the fullstack assignment.

## Features

- RESTful API endpoints
- Database migrations and seeding
- User authentication and authorization
- Request validation
- Error handling
- CORS support

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer

## Installation

### 1. Install Dependencies

```bash
cd backend-codeigniter
composer install
```

### 2. Configure Environment

Copy `.env` file and update database credentials:

```bash
cp .env.example .env
```

Edit `.env` and set your database details:
- `database.default.hostname`
- `database.default.database`
- `database.default.username`
- `database.default.password`

### 3. Run Migrations

```bash
php spark migrate
```

### 4. Seed Database (Optional)

```bash
php spark db:seed DatabaseSeeder
```

### 5. Start Development Server

```bash
php spark serve
```

The API will be available at `http://localhost:8000`

## API Endpoints

### Health Check
- `GET /api/health` - Check API status

### Users
- `GET /api/users` - Get all users
- `GET /api/users/:id` - Get user by ID
- `POST /api/users` - Create new user
- `PUT /api/users/:id` - Update user
- `DELETE /api/users/:id` - Delete user

### Authentication
- `POST /api/auth/register` - Register new user
- `POST /api/auth/login` - Login user
- `POST /api/auth/logout` - Logout user
- `POST /api/auth/refresh` - Refresh token

## Project Structure

```
backend-codeigniter/
├── app/
│   ├── Controllers/      # API Controllers
│   ├── Models/          # Database Models
│   ├── Config/          # Configuration Files
│   ├── Views/           # Views (for rendering)
│   └── Database/
│       ├── Migrations/  # Database Migrations
│       └── Seeds/       # Database Seeders
├── public/              # Public assets
├── writable/            # Writable directories (logs, uploads)
├── composer.json        # PHP Dependencies
├── .env                 # Environment Variables
└── README.md           # This file
```

## Development Notes

- All API responses use JSON format
- Include appropriate HTTP status codes
- Use proper error handling and validation
- Follow RESTful conventions

## Support

For CodeIgniter documentation, visit: https://codeigniter.com/user_guide/
