# In-App Notification System Documentation

## Overview
This document describes the in-app notification system implemented for staff notifications when transactions are marked as 'Lunas' (Paid).

## Components

### 1. Database Migration
- **File**: `database/migrations/2025_01_01_000001_create_notifications_table.php`
- **Table**: `notifications`
- **Fields**:
  - `id` - Primary key
  - `title` - Notification title
  - `message` - Notification message content
  - `icon` - Bootstrap icon class (default: 'bi-bell')
  - `transaction_code` - Reference to transaction code
  - `is_read` - Boolean flag for read status (default: false)
  - `created_at`, `updated_at` - Timestamps

### 2. Notification Model
- **File**: `app/Models/Notification.php`
- **Features**:
  - Mass assignable fields
  - Boolean casting for `is_read`
  - Relationship with Transaction model

### 3. NotificationController
- **File**: `app/Http/Controllers/NotificationController.php`
- **Methods**:
  - `index()` - Display all notifications
  - `markAsRead($id)` - Mark single notification as read
  - `markAllAsRead()` - Mark all notifications as read
  - `getUnreadCount()` - Get count of unread notifications

### 4. BookingController Integration
- **File**: `app/Http/Controllers/BookingController.php`
- **Changes**:
  - Added import for `App\Models\Notification as AppNotification`
  - Modified `callback()` method to trigger notification creation
  - Added `createNotification($transaction)` private method

### 5. Staff Navbar
- **File**: `resources/views/staff/layouts/navbar.blade.php`
- **Features**:
  - Dynamic notification counter
  - Recent notifications dropdown
  - Mark as read functionality
  - AJAX requests for real-time updates

### 6. Notification Index View
- **File**: `resources/views/staff/notifications/index.blade.php`
- **Features**:
  - List all notifications
  - Mark single/all as read
  - View transaction details
  - Responsive design

### 7. Routes
- **File**: `routes/web.php`
- **Routes** (under `staff` prefix with `auth:staff` middleware):
  - `GET /staff/notifications` - View all notifications
  - `POST /staff/notifications/{id}/mark-read` - Mark notification as read
  - `POST /staff/notifications/mark-all-read` - Mark all as read
  - `GET /staff/notifications/unread-count` - Get unread count

## How It Works

1. **Trigger**: When a payment callback from Midtrans changes transaction status to 'Lunas'
2. **Creation**: A notification is automatically created with:
   - Title: "Pembayaran Berhasil"
   - Message: "Transaksi {code} telah dibayar lunas oleh {customer_name}"
   - Icon: "bi-check-circle text-success"
3. **Display**: Staff can view notifications in:
   - Navbar dropdown (recent 5 notifications)
   - Full notifications page (/staff/notifications)
4. **Management**: Staff can mark notifications as read individually or all at once

## Security

- **Access Control**: Only staff users can access notifications (protected by `auth:staff` middleware)
- **CSRF Protection**: All POST requests include CSRF token validation
- **Error Handling**: Database queries wrapped in try-catch blocks

## JavaScript Functions

### Navbar Functions
- `markAsRead(notificationId)` - Mark notification as read from navbar

### Index Page Functions
- `markSingleAsRead(notificationId)` - Mark single notification as read
- `markAllAsRead()` - Mark all notifications as read

## Styling

- Unread notifications have blue left border and light gray background
- Read notifications have reduced opacity
- Bootstrap icons for visual indicators
- Responsive design for mobile compatibility

## Database Relationships

```php
// Notification belongs to Transaction
$notification->transaction() // Returns transaction details

// Transaction code is stored as string reference
// This allows for flexible querying and prevents cascade issues
```

## Usage Examples

### Creating a notification manually:
```php
use App\Models\Notification;

Notification::create([
    'title' => 'Test Notification',
    'message' => 'This is a test message',
    'icon' => 'bi-info-circle',
    'transaction_code' => 'TRANS-1234',
]);
```

### Querying notifications:
```php
// Get all unread notifications
$unread = Notification::where('is_read', false)->get();

// Get notifications for a specific transaction
$transaction_notifications = Notification::where('transaction_code', 'TRANS-1234')->get();
```

## Future Enhancements

1. **User-specific notifications**: Add `staff_id` field to target specific staff members
2. **Notification types**: Add `type` field for different notification categories
3. **Email integration**: Send email notifications for critical updates
4. **Push notifications**: Implement browser push notifications
5. **Notification settings**: Allow staff to configure notification preferences