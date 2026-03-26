# Fullstack Assignment - Main README

A complete fullstack web application built with:
- **Frontend**: Next.js, React, TypeScript
- **Backend**: CodeIgniter 4, PHP
- **Database**: MySQL

## Project Structure

```
fullstack-assignment/
├── backend-codeigniter/    # REST API backend
├── frontend-nextjs/        # React frontend
└── database/               # Database schema
```

## Quick Start

### Prerequisites
- Node.js 16+ (for frontend)
- PHP 7.4+ (for backend)
- MySQL 5.7+ (for database)
- Composer (for PHP dependencies)

### 1. Setup Backend

```bash
cd backend-codeigniter
composer install
cp .env.example .env
# Edit .env with your database credentials
php spark migrate
php spark serve
```

Backend runs on: `http://localhost:8000`

### 2. Setup Database

```bash
mysql -u root -p < ../database/assignment.sql
```

Or import `database/assignment.sql` using MySQL Workbench/phpMyAdmin.

### 3. Setup Frontend

```bash
cd frontend-nextjs
npm install
npm run dev
```

Frontend runs on: `http://localhost:3000`

## Features

### Backend (CodeIgniter)
- ✅ RESTful API endpoints
- ✅ User management (CRUD operations)
- ✅ Database migrations
- ✅ Input validation
- ✅ Error handling
- ✅ CORS support
- ✅ Seed data

### Frontend (Next.js)
- ✅ User listing
- ✅ Create new user
- ✅ View user details
- ✅ Delete user
- ✅ Responsive design
- ✅ API integration
- ✅ Form validation
- ✅ Error handling

### Database
- ✅ Users table
- ✅ Products table
- ✅ Orders table
- ✅ Order items table
- ✅ Sample data seeding
- ✅ Proper indexing
- ✅ Foreign key relationships

## API Endpoints

### Health Check
- `GET /api/health` - Check API status
- `GET /api` - Welcome message

### Users
- `GET /api/users` - Get all users
- `GET /api/users/:id` - Get user by ID
- `POST /api/users` - Create new user
- `PUT /api/users/:id` - Update user
- `DELETE /api/users/:id` - Delete user

## Development

### Frontend Development
```bash
cd frontend-nextjs
npm run dev
npm run lint
npm run test
```

### Backend Development
```bash
cd backend-codeigniter
php spark serve
php spark migrate
php spark db:seed UserSeeder
```

### Database Management
```bash
# Run migrations
php spark migrate

# Rollback migrations
php spark migrate:rollback

# Refresh migrations
php spark migrate:refresh

# Seed database
php spark db:seed UserSeeder
```

## File Structure

### Backend
```
backend-codeigniter/
├── app/
│   ├── Controllers/      # API Controllers
│   ├── Models/          # Database Models
│   ├── Config/          # Configuration
│   ├── Views/           # Views
│   └── Database/
│       ├── Migrations/  # Database Migrations
│       └── Seeds/       # Database Seeders
├── public/              # Public assets
├── writable/            # Writable files (logs, cache)
├── composer.json        # PHP dependencies
└── .env                 # Environment variables
```

### Frontend
```
frontend-nextjs/
├── app/
│   ├── layout.tsx       # Root layout
│   ├── page.tsx         # Home page
│   ├── users/           # Users pages
│   └── globals.css      # Global styles
├── components/          # Reusable components
├── lib/                 # Utility functions
├── public/              # Static assets
├── package.json         # Node dependencies
├── next.config.js       # Next.js config
└── tsconfig.json        # TypeScript config
```

## Environment Variables

### Backend (.env)
```
CI_ENVIRONMENT=development
database.default.hostname=localhost
database.default.database=assignment_db
database.default.username=root
database.default.password=
database.default.DBDriver=MySQLi

app.baseURL=http://localhost:8000
cors.allowedOrigins=http://localhost:3000
```

### Frontend (.env.local)
```
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

## Troubleshooting

### Backend Issues

**Composer install fails**
```bash
composer install --no-interaction
```

**Database connection error**
- Check MySQL is running
- Verify credentials in .env
- Ensure database exists

**Migration fails**
```bash
php spark migrate:refresh
php spark db:seed
```

### Frontend Issues

**npm install fails**
```bash
rm -rf node_modules package-lock.json
npm install
```

**API connection error**
- Check backend is running on http://localhost:8000
- Check NEXT_PUBLIC_API_URL in .env.local
- Check CORS settings in backend

## Testing

### Backend Tests
```bash
vendor/bin/phpunit
```

### Frontend Tests
```bash
npm run test
npm run test:watch
```

## Deployment

### Deploying Backend
1. Set `CI_ENVIRONMENT=production` in .env
2. Run migrations on production: `php spark migrate --env production`
3. Configure web server (Apache/Nginx)
4. Set proper file permissions

### Deploying Frontend
```bash
npm run build
npm start
```

## Additional Resources

- [CodeIgniter 4 Documentation](https://codeigniter.com/user_guide/)
- [Next.js Documentation](https://nextjs.org/docs)
- [React Documentation](https://react.dev/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

## License

This project is open source and available under the MIT License.

## Support

For issues or questions, please check the documentation in:
- Backend: `backend-codeigniter/README.md`
- Frontend: `frontend-nextjs/README.md`
- API Docs: `backend-codeigniter/API_DOCUMENTATION.md`
