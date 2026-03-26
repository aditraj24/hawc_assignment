# Complete Installation Guide

## Overview

This guide provides step-by-step instructions to install and run the Fullstack Assignment project locally.

## System Requirements

### Minimum Requirements
- **PHP**: 7.4 or higher
- **Node.js**: 16.x or higher  
- **MySQL**: 5.7 or higher
- **Composer**: Latest version
- **RAM**: 2GB minimum
- **Disk Space**: 1GB minimum

### Recommended
- PHP 8.1+
- Node.js 18+
- MySQL 8.0+
- 4GB+ RAM

## Windows Installation

### Step 1: Install Prerequisites

#### PHP Installation
1. Download PHP from [windows.php.net](https://windows.php.net/download/) or use XAMPP:
   - Visit [apachefriends.org](https://www.apachefriends.org/)
   - Download XAMPP (includes PHP, MySQL, Apache)
   - Install to `C:\xampp`

2. Verify PHP installation:
   ```powershell
   php -v
   ```

#### MySQL Installation
- If using XAMPP, MySQL is included
- Otherwise, download from [mysql.com](https://dev.mysql.com/downloads/mysql/)
- Start MySQL service

#### Composer Installation
1. Download from [getcomposer.org](https://getcomposer.org/download/)
2. Run the Windows installer
3. Select your PHP executable during installation
4. Verify installation:
   ```powershell
   composer --version
   ```

#### Node.js Installation
1. Download from [nodejs.org](https://nodejs.org/)
2. Run the installer (includes npm)
3. Verify installation:
   ```powershell
   node --version
   npm --version
   ```

### Step 2: Navigate to Project

```powershell
cd e:\codes\hawc_assignment\fullstack-assignment
```

### Step 3: Install Frontend Dependencies

```powershell
cd frontend-nextjs
npm install
cd ..
```

This will:
- Install all packages from package.json
- Create node_modules folder
- Generate package-lock.json

**Expected time**: 3-5 minutes

### Step 4: Install Backend Dependencies

```powershell
cd backend-codeigniter
composer install
cd ..
```

This will:
- Download CodeIgniter framework
- Install all PHP dependencies
- Generate vendor folder

**Expected time**: 2-3 minutes

### Step 5: Setup Database

#### Option A: Using GUI (Recommended for beginners)
1. Open phpMyAdmin (usually http://localhost/phpmyadmin if using XAMPP)
2. Click "New Database"
3. Enter database name: `assignment_db`
4. Click "Create"
5. Select the database
6. Go to "Import" tab
7. Choose file: `database/assignment.sql`
8. Click "Import"

#### Option B: Using MySQL CLI
```powershell
# Open PowerShell in the project directory
cd "e:\codes\hawc_assignment\fullstack-assignment"

# Run the SQL file
mysql -u root -p assignment_db < database\assignment.sql

# When prompted, enter your MySQL password
```

#### Option C: Using CodeIgniter Migrations
```powershell
cd backend-codeigniter
php spark migrate
php spark db:seed UserSeeder
```

### Step 6: Configure Environment Variables

#### Backend Configuration
```powershell
# Open backend-codeigniter\.env in your text editor
# Update these values to match your MySQL setup:

database.default.hostname=localhost
database.default.database=assignment_db
database.default.username=root
database.default.password=         # Your MySQL password if any
```

#### Frontend Configuration
The frontend is already configured. If you change the backend URL, update:
```
frontend-nextjs\.env.local:
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

### Step 7: Start the Application

**Terminal 1 - Backend Server**:
```powershell
cd e:\codes\hawc_assignment\fullstack-assignment\backend-codeigniter
php spark serve
```

Expected output:
```
CodeIgniter v4.x.x Command Line Tool - Server-based Development App v4.1.5

Server running on http://127.0.0.1:8000
Press Control + C to stop the server
```

**Terminal 2 - Frontend Server**:
```powershell
cd e:\codes\hawc_assignment\fullstack-assignment\frontend-nextjs
npm run dev
```

Expected output:
```
  ▲ Next.js 14.0.0
  - Local:        http://localhost:3000
  - Environments: .env.local

 ✓ Ready in 2.3s
```

### Step 8: Verify Installation

1. **Check Backend API**:
   - Open browser: `http://localhost:8000/api/health`
   - Should see JSON response with status "success"

2. **Check Frontend**:
   - Open browser: `http://localhost:3000`
   - Should see the home page

3. **Test User Management**:
   - Click "View Users" on home page
   - Should see the 3 sample users from database

## macOS Installation

### Step 1: Install Prerequisites Using Homebrew

```bash
# Install Homebrew if not already installed
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# Install PHP
brew install php

# Install MySQL
brew install mysql

# Install Node.js
brew install node

# Install Composer
brew install composer
```

### Step 2-8: Follow Same Steps as Windows

For steps 2-8, follow the same instructions as the Windows section above.

## Linux (Ubuntu/Debian) Installation

### Step 1: Install Prerequisites

```bash
# Update package manager
sudo apt update
sudo apt upgrade

# Install PHP and extensions
sudo apt install php php-cli php-fpm php-mysql php-curl php-dom php-mbstring

# Install MySQL
sudo apt install mysql-server

# Install Node.js and npm
sudo apt install nodejs npm

# Install Composer
curl -sS https://getinstaller.com/composer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Step 2: Setup Project

```bash
cd ~/projects/fullstack-assignment
# or wherever you placed the project
```

### Step 3-8: Follow Same Steps as Windows

## Post-Installation Verification

Run this checklist to verify everything is working:

```
✓ PHP version 7.4+
✓ MySQL running and accessible
✓ Composer installed
✓ Node.js 16+ installed
✓ npm installed
✓ Backend dependencies installed (vendor folder exists)
✓ Frontend dependencies installed (node_modules exists)
✓ Database created and populated
✓ .env files configured
✓ Backend server running on http://localhost:8000
✓ Frontend server running on http://localhost:3000
✓ API endpoints responding
✓ Frontend pages loading
✓ User list showing sample data
✓ Can create new users
```

## Quick Start Commands

After installation, use these commands:

### Backend
```powershell
cd backend-codeigniter
php spark serve              # Start development server
php spark migrate            # Run database migrations
php spark db:seed            # Seed sample data
php spark tinker             # PHP REPL
php spark list               # Show all commands
```

### Frontend
```powershell
cd frontend-nextjs
npm run dev                   # Start development server
npm run build                 # Build for production
npm run lint                  # Run linter
npm test                      # Run tests
npm run start                 # Start production server
```

## Troubleshooting

### Composer Not Found
**Error**: `composer : The term 'composer' is not recognized`

**Solution**:
1. Verify Composer is installed: Visit [getcomposer.org](https://getcomposer.org/)
2. Close and reopen PowerShell after installation
3. Or use: `php composer.phar install` instead of `composer install`

### Port Already in Use (3000 or 8000)
**Error**: `Address already in use`

**Solution - Windows**:
```powershell
# Kill process on port 3000
netstat -ano | findstr :3000
taskkill /PID <PID> /F

# Or use different port
npm run dev -- -p 3001    # Frontend on port 3001
php spark serve -p 8001   # Backend on port 8001
```

**Solution - macOS/Linux**:
```bash
# Kill process on port 3000
lsof -i :3000
kill -9 <PID>

# Or use different port
npm run dev -- -p 3001
php spark serve -p 8001
```

### Database Connection Error
**Error**: `SQLSTATE[HY000]: General error: 1030`

**Solutions**:
1. Verify MySQL is running
2. Check credentials in `.env`
3. Verify database exists: `assignment_db`
4. Check MySQL user has proper permissions:
   ```sql
   GRANT ALL PRIVILEGES ON assignment_db.* TO 'root'@'localhost';
   FLUSH PRIVILEGES;
   ```

### npm install Fails
**Error**: `npm ERR! enoent ENOENT: no such file or directory`

**Solution**:
```powershell
# Clear npm cache
npm cache clean --force

# Remove node_modules and lock file
rm -r node_modules
rm package-lock.json

# Reinstall
npm install
```

### PHP Version Mismatch
**Error**: `This package requires php: ^7.4 || ^8.0`

**Solution**:
1. Check current PHP version:
   ```powershell
   php -v
   ```
2. Update PHP to 7.4 or higher
3. Or use XAMPP which handles versions automatically

## Getting Help

### Check Logs

**Backend Logs**:
```powershell
# Look in writable/logs directory
Get-ChildItem backend-codeigniter\writable\logs\
```

**Frontend Console**:
- Open browser developer tools (F12)
- Check Console tab for errors

### Enable Debug Mode

**Backend Debug** - Update `.env`:
```
CI_ENVIRONMENT=development
```

**Frontend Debug** - Browser DevTools:
- Press F12
- Check network tab for API calls
- Check console for JavaScript errors

### Useful Resources

- [CodeIgniter 4 Docs](https://codeigniter.com/user_guide/)
- [Next.js Docs](https://nextjs.org/docs)  
- [PHP Docs](https://www.php.net/docs.php)
- [MySQL Docs](https://dev.mysql.com/doc/)
- [Node.js Docs](https://nodejs.org/docs/)

## Next Steps After Installation

1. ✅ Verify everything is working
2. 📚 Read the README.md
3. 📖 Review API documentation
4. 🔧 Explore the codebase
5. ✨ Implement additional features as required
6. 🧪 Write and run tests
7. 🚀 Deploy to production

## Support

If you encounter issues not listed above:

1. Check the relevant README:
   - `backend-codeigniter/README.md`
   - `frontend-nextjs/README.md`

2. Check API Documentation:
   - `backend-codeigniter/API_DOCUMENTATION.md`

3. Review the main README:
   - `README.md`

4. Check project logs and error messages

## Maintenance

### Regular Tasks

```bash
# Keep dependencies updated
npm outdated                  # Check for updates
npm update                    # Update packages
composer outdated             # Check PHP updates
composer update               # Update packages

# Run tests
npm test
npm run build

# Check code quality
npm run lint
php spark list
```

### Database Backups

```bash
# Backup database
mysqldump -u root -p assignment_db > backup.sql

# Restore from backup
mysql -u root -p assignment_db < backup.sql
```

---

**Installation Complete!** 🎉

Your Fullstack Assignment is now ready for development. Visit `http://localhost:3000` to get started.
