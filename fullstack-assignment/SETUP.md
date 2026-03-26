# SETUP INSTRUCTIONS

Complete guide for setting up the fullstack assignment project.

## Prerequisites

### Windows
- **PHP**: Download from [windows.php.net](https://windows.php.net/) or use XAMPP/WAMP
- **MySQL**: Use MariaDB, MySQL Community Server, or XAMPP package
- **Node.js**: Download from [nodejs.org](https://nodejs.org/)
- **Composer**: Download from [getcomposer.org](https://getcomposer.org/)
- **Git**: Download from [git-scm.com](https://git-scm.com/)

### macOS
```bash
# Using Homebrew
brew install php mysql node
brew install composer
```

### Linux (Ubuntu/Debian)
```bash
sudo apt-get install php php-mysql php-curl php-dom
sudo apt-get install mysql-server
sudo apt-get install nodejs npm
sudo apt-get install composer
```

## Installation Steps

### 1. Clone/Extract Project

Navigate to your workspace:
```bash
cd e:\codes\hawc_assignment
```

### 2. Setup Backend (CodeIgniter)

```bash
cd fullstack-assignment/backend-codeigniter

# Install PHP dependencies
composer install

# Copy environment file
copy .env.example .env  # Windows
# or
cp .env.example .env    # macOS/Linux

# Edit .env with your database credentials
# Open .env in your editor and update:
# - database.default.hostname
# - database.default.database
# - database.default.username
# - database.default.password
```

### 3. Setup Database

#### Option A: Using MySQL CLI
```bash
mysql -u root -p
CREATE DATABASE assignment_db;
USE assignment_db;
source e:\codes\hawc_assignment\database\assignment.sql;  # Windows
# or
source /path/to/database/assignment.sql;  # macOS/Linux
```

#### Option B: Using CodeIgniter Migrations
```bash
cd backend-codeigniter
php spark migrate
php spark db:seed UserSeeder
```

#### Option C: Using GUI (phpMyAdmin/MySQL Workbench)
1. Create new database: `assignment_db`
2. Import file: `database/assignment.sql`

### 4. Start Backend Server

```bash
cd backend-codeigniter
php spark serve
```

Backend API available at: `http://localhost:8000`

### 5. Setup Frontend (Next.js)

In a new terminal:

```bash
cd fullstack-assignment/frontend-nextjs

# Install Node dependencies
npm install

# Create environment file
copy .env.example .env.local  # Windows
# or
cp .env.example .env.local     # macOS/Linux

# Edit .env.local if needed (default is correct)
```

### 6. Start Frontend Server

```bash
npm run dev
```

Frontend available at: `http://localhost:3000`

## Verification

### Check Backend
1. Open terminal and run:
   ```bash
   curl http://localhost:8000/api/health
   ```
   Expected response:
   ```json
   {"status":"success","message":"API is running","timestamp":"2024-01-01 12:00:00"}
   ```

2. Or use a browser:
   - Visit `http://localhost:8000/api`
   - Visit `http://localhost:8000/api/health`

### Check Frontend
1. Open browser and navigate to `http://localhost:3000`
2. You should see the home page
3. Click "View Users" to see the users list
4. Try creating a new user

### Check Database
```bash
# Using MySQL CLI
mysql -u root -p assignment_db
SELECT * FROM users;
```

## Common Issues & Solutions

### Issue: "composer command not found"
**Solution**: 
- Windows: Add composer to PATH or use `php composer.phar install`
- macOS/Linux: Use `composer install` (should be in PATH after installation)

### Issue: "SQLSTATE[HY000]: General error: 1030"
**Solution**: 
- Check MySQL is running
- Verify database credentials in .env
- Ensure sufficient disk space

### Issue: "npm ERR! enoent"
**Solution**:
```bash
rm -rf node_modules package-lock.json
npm install
```

### Issue: "Cannot GET /api/users"
**Solution**:
- Check backend is running on http://localhost:8000
- Check .env NEXT_PUBLIC_API_URL points to correct URL
- Verify API routes in `backend-codeigniter/app/Config/Routes.php`

### Issue: "Port 3000 already in use"
**Solution**:
```bash
# Windows
netstat -ano | findstr :3000
taskkill /PID <PID> /F

# macOS/Linux
lsof -i :3000
kill -9 <PID>
```

### Issue: "Port 8000 already in use"
**Solution**:
```bash
# Kill the process using port 8000
# Windows
netstat -ano | findstr :8000
taskkill /PID <PID> /F

# macOS/Linux
lsof -i :8000
kill -9 <PID>
```

## Running Tests

### Backend Tests
```bash
cd backend-codeigniter
vendor/bin/phpunit
```

### Frontend Tests
```bash
cd frontend-nextjs
npm test
```

## Building for Production

### Backend
```bash
cd backend-codeigniter
# Update .env
CI_ENVIRONMENT=production
# Optimize autoloader
composer dump-autoload -o
```

### Frontend
```bash
cd frontend-nextjs
npm run build
npm start
```

## Database Default Login

Sample users created during seeding:

| Email | Password |
|-------|----------|
| admin@example.com | password123 |
| john@example.com | password123 |
| jane@example.com | password123 |

## Next Steps

1. ✅ Complete the fullstack application per assignment requirements
2. ✅ Add authentication/JWT if needed
3. ✅ Add more features as required
4. ✅ Write unit tests
5. ✅ Deploy to production

## Support Documentation

- Backend Guide: `backend-codeigniter/README.md`
- Frontend Guide: `frontend-nextjs/README.md`
- API Documentation: `backend-codeigniter/API_DOCUMENTATION.md`
- Main README: `README.md`
