# Development Guidelines

## Code Style & Standards

### Frontend (Next.js/React/TypeScript)

#### Naming Conventions
- **Files**: Use kebab-case for files: `user-list.tsx`, `form-input.tsx`
- **Components**: Use PascalCase: `UserList`, `FormInput`
- **Variables**: Use camelCase: `userData`, `isLoading`
- **Constants**: Use UPPER_SNAKE_CASE: `API_URL`, `MAX_USERS`

#### File Organization
```
frontend-nextjs/
├── app/                          # Route pages
│   ├── (group)/                  # Route groups
│   ├── [id]/                     # Dynamic routes
│   └── page.tsx                  # Root page
├── components/
│   ├── common/                   # Shared components
│   │   ├── Header.tsx
│   │   └── Footer.tsx
│   ├── forms/                    # Form components
│   │   └── UserForm.tsx
│   └── users/                    # Feature-specific
│       └── UserCard.tsx
├── lib/
│   ├── api.ts                    # API calls
│   ├── types.ts                  # TypeScript types
│   └── utils.ts                  # Helper functions
└── styles/
    └── globals.css               # Global styles
```

#### TypeScript Best Practices
```typescript
// 1. Always define types
interface User {
  id: number;
  name: string;
  email: string;
}

// 2. Use explicit return types
function getUser(id: number): Promise<User> {
  // ...
}

// 3. Avoid 'any' type
// ❌ const data: any = response.data;
// ✅ const data: User = response.data;

// 4. Use strict null checks
// ✅ const name: string | null = user?.name ?? null;
```

#### Component Best Practices
```typescript
// 1. Use functional components
export function UserList() {
  const [users, setUsers] = useState<User[]>([]);
  // ...
}

// 2. Extract props to interfaces
interface UserListProps {
  onUserSelect: (user: User) => void;
  loading?: boolean;
}

export function UserList({ onUserSelect, loading = false }: UserListProps) {
  // ...
}

// 3. Use proper hooks
// useEffect for side effects
// useCallback for memoized functions
// useMemo for expensive computations
```

### Backend (CodeIgniter/PHP)

#### Naming Conventions
- **Classes**: Use PascalCase: `UserModel`, `UserController`
- **Methods**: Use camelCase: `getUser()`, `createUser()`
- **Variables**: Use camelCase: `$userData`
- **Constants**: Use UPPER_SNAKE_CASE: `API_VERSION`

#### File Organization
```
backend-codeigniter/app/
├── Controllers/
│   ├── BaseController.php        # Base for all controllers
│   └── Users.php                 # Feature controllers
├── Models/
│   └── UserModel.php
├── Middleware/
│   └── AuthMiddleware.php
├── Filters/
│   └── CORS.php
├── Config/
│   ├── Routes.php
│   ├── Database.php
│   └── Services.php
├── Libraries/
│   ├── JwtHandler.php
│   └── ResponseFormatter.php
└── Database/
    ├── Migrations/
    └── Seeds/
```

#### PHP Code Standards
```php
<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Users extends BaseController
{
    use ResponseTrait;

    // 1. Use type hints
    public function create(): ResponseInterface
    {
        // 2. Validate input
        if (!$this->validate([
            'email' => 'required|valid_email|is_unique[users.email]',
        ])) {
            return $this->fail($this->validator->getErrors());
        }

        // 3. Use models
        $userModel = new UserModel();
        $id = $userModel->insert([
            'email' => $this->request->getVar('email'),
        ]);

        // 4. Return proper response
        return $this->respondCreated([
            'id' => $id,
            'message' => 'User created',
        ]);
    }
}
```

## Git Workflow

### Branch Naming
```
main                    # Main branch
develop                 # Development branch
feature/user-auth       # Feature branches
bugfix/login-issue      # Bug fix branches
hotfix/security-fix     # Hot fix branches
docs/api-docs           # Documentation branches
```

### Commit Messages
```
feat: Add user authentication
fix: Fix login validation error
docs: Update installation guide
style: Format code with prettier
refactor: Improve error handling
test: Add unit tests for UserModel
chore: Update dependencies
```

## Testing

### Frontend Tests
```typescript
// tests/components/UserList.test.tsx
import { render, screen } from '@testing-library/react';
import { UserList } from '@/components/UserList';

describe('UserList', () => {
  it('renders user list', () => {
    render(<UserList />);
    expect(screen.getByText('Users')).toBeInTheDocument();
  });
});
```

### Backend Tests
```php
// tests/unit/UserModelTest.php
namespace Tests\Unit;

class UserModelTest extends CIUnitTestCase
{
    public function testCreateUser()
    {
        $userModel = new UserModel();
        $id = $userModel->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        $this->assertIsInt($id);
    }
}
```

## Performance Guidelines

### Frontend
1. **Code splitting**: Use dynamic imports for routes
   ```typescript
   const AdminPanel = dynamic(() => import('@/components/AdminPanel'), {
     loading: () => <LoadingSpinner />,
   });
   ```

2. **Image optimization**: Use Next.js Image component
   ```typescript
   <Image src="/avatar.jpg" alt="User" width={50} height={50} />
   ```

3. **Memoization**: Use React.memo for expensive components
   ```typescript
   export const UserCard = React.memo(({ user }: UserCardProps) => {
     // ...
   });
   ```

### Backend
1. **Query optimization**: Use indexes and eager loading
2. **Caching**: Cache frequently accessed data
3. **Pagination**: Limit results in list endpoints

## Security Guidelines

### Frontend
- ✅ Use HTTPS in production
- ✅ Sanitize user input
- ✅ Use Content Security Policy headers
- ✅ Never store sensitive data in localStorage
- ✅ Use secure cookies for tokens

### Backend
- ✅ Validate all inputs
- ✅ Use parameterized queries (prepared statements)
- ✅ Hash passwords securely
- ✅ Implement rate limiting
- ✅ Use HTTPS only
- ✅ Set CORS properly
- ✅ Validate JWT tokens
- ✅ Use prepared statements

## Debugging

### Frontend
```typescript
// Use console for debugging
console.log('Component mounted'); 
console.error('Error occurred:', error);
console.warn('Deprecated method used');

// Use browser DevTools
// - Inspector for DOM
// - Console for JS
// - Network for API calls
// - Application for storage
```

### Backend
```php
// Use logging
log_message('info', 'User created: ' . $userId);
log_message('error', 'Database error: ' . $error->getMessage());

// Use var_dump for debugging
var_dump($data);

// Enable debug mode in .env
CI_ENVIRONMENT=development
```

## Documentation

### Code Comments
```typescript
/**
 * Fetches a user by ID from the API
 * @param {number} id - The user ID
 * @returns {Promise<User>} The user object
 * @throws {Error} If user not found
 */
async function getUser(id: number): Promise<User> {
  // ...
}
```

### README Files
- Keep README up to date
- Include installation instructions
- Document API endpoints
- List dependencies

## Deployment Checklist

Before deploying:

- [ ] Run tests: `npm test` and `vendor/bin/phpunit`
- [ ] Check build: `npm run build`
- [ ] No console errors
- [ ] No unresolved TODOs
- [ ] Update version numbers
- [ ] Update .env for production
- [ ] Database migrations run
- [ ] HTTPS enabled
- [ ] CORS configured properly
- [ ] Rate limiting enabled
- [ ] Monitoring set up

## Useful Commands

### Frontend
```bash
npm run dev              # Start dev server
npm run build            # Build for production
npm run lint             # Check code style
npm test                 # Run tests
npm run test:watch       # Watch mode tests
```

### Backend
```bash
php spark serve          # Start dev server
php spark migrate        # Run migrations
php spark migrate:fresh  # Reset database
php spark db:seed        # Seed data
php spark tinker         # Interactive shell
```

## References

- [Next.js Best Practices](https://nextjs.org/docs/best-practices)
- [React Best Practices](https://react.dev/learn)
- [CodeIgniter Standards](https://codeigniter.com/user_guide/)
- [PHP PSR Standards](https://www.php-fig.org/)
- [TypeScript Handbook](https://www.typescriptlang.org/docs/)
