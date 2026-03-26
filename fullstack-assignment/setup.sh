#!/bin/bash
# Fullstack Assignment Setup Script for macOS/Linux

echo "========================================"
echo "Fullstack Assignment - Setup"
echo "========================================"
echo ""

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "WARNING: Composer is not installed"
    echo "Please install Composer from: https://getcomposer.org/"
    echo ""
    echo "Installation instructions:"
    echo "1. Run: curl -sS https://getinstaller.com/composer | php"
    echo "2. Or visit: https://getcomposer.org/download/"
    echo ""
else
    echo "Found Composer - Installing backend dependencies..."
    cd backend-codeigniter
    composer install
    cd ..
    echo "✓ Backend dependencies installed!"
    echo ""
fi

# Check if npm is installed
if ! command -v npm &> /dev/null; then
    echo "ERROR: Node.js/npm is not installed"
    echo "Please install Node.js from: https://nodejs.org/"
    echo ""
    exit 1
else
    echo "Found npm - Installing frontend dependencies..."
    cd frontend-nextjs
    npm install
    cd ..
    echo "✓ Frontend dependencies installed!"
    echo ""
fi

echo "========================================"
echo "Setup Complete!"
echo "========================================"
echo ""
echo "Next steps:"
echo ""
echo "1. Setup Database:"
echo "   - Import database/assignment.sql into MySQL"
echo "   - Or use MySQL CLI:"
echo "     mysql -u root -p < database/assignment.sql"
echo ""
echo "2. Configure .env files:"
echo "   - Edit backend-codeigniter/.env with your database credentials"
echo "   - Edit frontend-nextjs/.env.local if needed"
echo ""
echo "3. Start Backend:"
echo "   cd backend-codeigniter"
echo "   php spark serve"
echo ""
echo "4. Start Frontend (in another terminal):"
echo "   cd frontend-nextjs"
echo "   npm run dev"
echo ""
echo "Then visit: http://localhost:3000"
echo ""
