# Admin Module Documentation

## Overview
The Admin module of the Hotel Management System is responsible for managing various aspects of the hotel operations. This includes user management, room management, booking management, and reporting functionalities.

## CSS Color Schemes
The following color schemes are used throughout the Admin module:
- Primary Color: #003366 (Dark Blue)
- Secondary Color: #006699 (Light Blue)
- Background Color: #FFFFFF (White)
- Text Color: #333333 (Dark Grey)

## Font Alignment
- **Headings**: Center aligned, font size 24px, font weight bold.
- **Body Text**: Left aligned, font size 14px.
- **Buttons**: Center aligned, font size 16px, padding 10px 20px.

## HTML Structure
The HTML structure is interspersed with PHP for dynamic content generation. Basic layout:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <!-- Navigation Links -->
    </nav>
    <main>
        <!-- Dynamic Content -->
    </main>
    <footer>
        <p>&copy; 2026 Hotel Management System</p>
    </footer>
</body>
</html>
```

## PHP Backend
The PHP backend handles:
- User authentication and authorization.
- CRUD operations for rooms and bookings.
- Data retrieval for reports. 
- Example of user authentication:
```php
session_start();
bb$_SESSION['user'] = $user; // Set session variable
```

## JavaScript Functionality
JavaScript is used to enhance user interaction:
- Dynamic content updates using AJAX calls.
- Form validation before submission.

Example of an AJAX call to fetch room data:
```javascript
$.ajax({
    url: 'api/rooms.php',
    method: 'GET',
    success: function(data) {
        // Process data
    }
});
```

## Conclusion
This README provides an overview of the Admin module's structure and functionality. For further details, refer to individual module documentation.