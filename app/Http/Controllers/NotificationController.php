<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('transaction')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('staff.notifications.index', compact('notifications'));
    }
    
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
    
    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
    
    public function getUnreadCount()
    {
        $count = Notification::where('is_read', false)->count();
        
        return response()->json(['count' => $count]);
    }

    public function getRecent()
{
    $notifications = Notification::orderBy('created_at', 'desc')
        ->limit(2)
        ->get();
        
    return response()->json([
        'notifications' => $notifications
    ]);
}
    
}