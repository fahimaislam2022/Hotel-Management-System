# Hotel Management System – Admin Panel

A web-based **Hotel Management System Admin Panel** built to simplify hotel operations through a centralized management interface.  
This module allows administrators to manage rooms, monitor bookings, supervise housekeeping, handle customer records, track invoices, and maintain account security.

## Admin Module Overview

The admin side of the system is designed to support day-to-day hotel management tasks from a single dashboard.  
It provides secure authentication and a set of management tools for handling hotel resources, guests, reservations, and billing.

## Features

### 1. Admin Login
- Secure admin authentication
- Username and password based login
- "Remember Me" option for convenience

### 2. Dashboard Overview
- Displays summary statistics such as:
  - Total rooms
  - Available rooms
  - Check-ins today
  - Daily revenue
- Shows recent bookings
- Shows recent guest feedback

### 3. Room Management
- Add new rooms with:
  - Room type
  - Status
  - Price
  - Room image
- View all rooms in a table
- Update room details
- Delete room records
- Manage room availability status

### 4. Housekeeping Management
- Track cleaning status for all rooms
- Update housekeeping state quickly
- Supports room maintenance workflow

### 5. Customer Management
- Add new customer records
- Store guest details including:
  - Full name
  - Email
  - Phone number
  - Password
- View registered customers
- Update customer information
- Delete customer records
- Track total visits for loyalty monitoring

### 6. Booking Management
- Create new bookings from the admin side
- Assign customer and room
- Select check-in and check-out dates
- View all reservation records
- Track booking status
- Monitor booking amount

### 7. Invoices and Billing
- View generated invoice records
- Track room, guest, and date-related billing information
- Monitor total charged amount
- Manage payment status

### 8. Change Password
- Update admin account password securely
- Requires current password, new password, and confirmation

## Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL / phpMyAdmin

## Project Structure

``bash
PROJECT/
├── ADMIN/
├── USER/
