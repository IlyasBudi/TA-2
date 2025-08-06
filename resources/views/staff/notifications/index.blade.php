@extends('staff.layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Notifications</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/staff/dashboard">Home</a></li>
      <li class="breadcrumb-item active">Notifications</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Notifications</h5>

          @if($notifications->count() > 0)
            <div class="d-flex justify-content-between align-items-center mb-3">
              <p>Total notifications: {{ $notifications->count() }}</p>
              <button class="btn btn-primary btn-sm" onclick="markAllAsRead()">Mark All as Read</button>
            </div>

            @foreach($notifications as $notification)
            <div class="notification-card card mb-3 {{ $notification->is_read ? 'read' : 'unread' }}" data-id="{{ $notification->id }}">
              <div class="card-body">
                <div class="d-flex align-items-start">
                  <i class="{{ $notification->icon }} me-3" style="font-size: 1.5rem;"></i>
                  <div class="flex-grow-1">
                    <h6 class="card-title mb-1">{{ $notification->title }}</h6>
                    <p class="card-text">{{ $notification->message }}</p>
                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    @if($notification->transaction)
                      <div class="mt-2">
                        <a href="/staff/transaction/{{ $notification->transaction->id }}" class="btn btn-outline-primary btn-sm">
                          View Transaction
                        </a>
                      </div>
                    @endif
                  </div>
                  @if(!$notification->is_read)
                    <button class="btn btn-outline-success btn-sm mark-read-btn" onclick="markSingleAsRead({{ $notification->id }})">
                      <i class="bi bi-check"></i> Mark as Read
                    </button>
                  @else
                    <span class="badge bg-success">Read</span>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          @else
            <div class="alert alert-info">
              <i class="bi bi-info-circle me-2"></i>
              No notifications yet.
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>

<script>
function markSingleAsRead(notificationId) {
    fetch(`/staff/notifications/${notificationId}/mark-read`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const notificationCard = document.querySelector(`[data-id="${notificationId}"]`);
            if (notificationCard) {
                notificationCard.classList.remove('unread');
                notificationCard.classList.add('read');
                
                const markBtn = notificationCard.querySelector('.mark-read-btn');
                if (markBtn) {
                    markBtn.outerHTML = '<span class="badge bg-success">Read</span>';
                }
            }
        }
    })
    .catch(error => {
        console.error('Error marking notification as read:', error);
    });
}

function markAllAsRead() {
    fetch('/staff/notifications/mark-all-read', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update all notification cards
            document.querySelectorAll('.notification-card').forEach(card => {
                card.classList.remove('unread');
                card.classList.add('read');
                
                const markBtn = card.querySelector('.mark-read-btn');
                if (markBtn) {
                    markBtn.outerHTML = '<span class="badge bg-success">Read</span>';
                }
            });
            
            // Hide the mark all button
            document.querySelector('[onclick="markAllAsRead()"]').style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error marking all notifications as read:', error);
    });
}
</script>

<style>
.notification-card.unread {
    border-left: 4px solid #0d6efd;
    background-color: #f8f9fa;
}

.notification-card.read {
    opacity: 0.8;
}
</style>
@endsection