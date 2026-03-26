@echo off
REM Fullstack Assignment Setup Script for Windows

echo ========================================
echo Fullstack Assignment - Setup
echo ========================================
echo.

REM Check if Composer is installed
where composer >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo WARNING: Composer is not installed or not in PATH
    echo Please install Composer from: https://getcomposer.org/download/
    echo.
    echo Manual Installation Instructions:
    echo 1. Visit https://getcomposer.org/download/
    echo 2. Download and run the installer
    echo 3. During installation, select your PHP executable
    echo 4. After installation, restart this command prompt
    echo.
) else (
    echo Found Composer - Installing backend dependencies...
    cd backend-codeigniter
    composer install
    cd ..
    echo Backend dependencies installed!
    echo.
)

REM Check if Node/npm is installed
where npm >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Node.js/npm is not installed
    echo Please install Node.js from: https://nodejs.org/
    echo.
    exit /b 1
) else (
    echo Found npm - Installing frontend dependencies...
    cd frontend-nextjs
    npm install
    cd ..
    echo Frontend dependencies installed!
    echo.
)

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo Next steps:
echo.
echo 1. Setup Database:
echo    - Import database/assignment.sql into MySQL
echo    - Or use MySQL CLI:
echo      mysql -u root -p < database\assignment.sql
echo.
echo 2. Configure .env files:
echo    - Edit backend-codeigniter\.env with your database credentials
echo    - Edit frontend-nextjs\.env.local if needed
echo.
echo 3. Start Backend:
echo    cd backend-codeigniter
echo    php spark serve
echo.
echo 4. Start Frontend (in another terminal):
echo    cd frontend-nextjs
echo    npm run dev
echo.
echo Then visit: http://localhost:3000
echo.

pause
