# API Documentation

## Endpoints Overview

### Base URL
- Development: `http://localhost:8000/api`
- Production: `https://api.yourdomain.com/api`

## Response Format

All responses are in JSON format:

```json
{
  "status": "success|error",
  "data": {},
  "message": "Optional message"
}
```

## Users Endpoints

### Get All Users
- **URL**: `/api/users`
- **Method**: `GET`
- **Response**:
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2024-01-01T00:00:00+00:00"
    }
  ]
}
```

### Get User by ID
- **URL**: `/api/users/:id`
- **Method**: `GET`
- **Response**: Single user object

### Create User
- **URL**: `/api/users`
- **Method**: `POST`
- **Body**:
```json
{
  "name": "Jane Doe",
  "email": "jane@example.com",
  "password": "password123"
}
```

### Update User
- **URL**: `/api/users/:id`
- **Method**: `PUT`
- **Body**:
```json
{
  "name": "Jane Doe",
  "email": "jane.updated@example.com"
}
```

### Delete User
- **URL**: `/api/users/:id`
- **Method**: `DELETE`

## Error Responses

### 404 Not Found
```json
{
  "status": "error",
  "message": "User not found"
}
```

### 400 Bad Request
```json
{
  "status": "error",
  "errors": {
    "email": "Email already registered",
    "password": "Password must be at least 6 characters"
  }
}
```

### 500 Server Error
```json
{
  "status": "error",
  "message": "Internal server error"
}
```

## HTTP Status Codes

- `200 OK` - Request successful
- `201 Created` - Resource created successfully
- `204 No Content` - Deleted successfully
- `400 Bad Request` - Invalid input
- `404 Not Found` - Resource not found
- `500 Internal Server Error` - Server error
