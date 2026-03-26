# Next.js Frontend

Next.js frontend for the fullstack assignment application.

## Features

- Modern React with TypeScript support
- Server-side rendering
- API integration with backend
- Responsive design with Tailwind CSS
- User management interface
- Authentication (future)

## Requirements

- Node.js 16.x or higher
- npm or yarn

## Installation

### 1. Install Dependencies

```bash
cd frontend-nextjs
npm install
# or
yarn install
```

### 2. Configure Environment

Create a `.env.local` file:

```bash
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

### 3. Start Development Server

```bash
npm run dev
# or
yarn dev
```

The application will be available at `http://localhost:3000`

## Build for Production

```bash
npm run build
npm start
```

## Project Structure

```
frontend-nextjs/
├── app/                  # App router and pages
│   ├── layout.tsx       # Root layout
│   ├── page.tsx         # Home page
│   └── users/           # Users pages
├── components/          # Reusable React components
├── lib/                 # Utility functions
├── public/              # Static assets
├── package.json         # Dependencies
├── next.config.js       # Next.js configuration
├── tsconfig.json        # TypeScript configuration
└── README.md           # This file
```

## Available Pages

- `/` - Home page
- `/users` - Users list
- `/users/[id]` - User detail page
- `/users/create` - Create new user

## API Integration

The frontend communicates with the backend API at `http://localhost:8000/api`.

### Example API Call

```typescript
import axios from 'axios';

const apiUrl = process.env.NEXT_PUBLIC_API_URL;

// Get all users
const users = await axios.get(`${apiUrl}/users`);

// Create user
const newUser = await axios.post(`${apiUrl}/users`, {
  name: 'John Doe',
  email: 'john@example.com',
  password: 'password123'
});
```

## Development Notes

- Use TypeScript for type safety
- Follow React best practices
- Use Tailwind CSS for styling
- Keep components reusable and modular
- Test components before deployment

## Support

For Next.js documentation, visit: https://nextjs.org/docs
