<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/staff/dashboard" class="logo d-flex align-items-center">
        <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" alt="">
        {{-- <span class="d-none d-lg-block">NiceAdmin</span> --}}
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- Notification Nav -->
         <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            @php
              try {
                $unreadCount = \App\Models\Notification::where('is_read', false)->count();
              } catch (\Exception $e) {
                $unreadCount = 0;
              }
            @endphp
            @if($unreadCount > 0)
              <span class="badge bg-primary badge-number">{{ $unreadCount }}</span>
            @endif
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              @if($unreadCount > 0)
                You have {{ $unreadCount }} new notification{{ $unreadCount > 1 ? 's' : '' }}
              @else
                No new notifications
              @endif
              <a href="/staff/notifications"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            @php
              try {
                $recentNotifications = \App\Models\Notification::orderBy('created_at', 'desc')->limit(2)->get();
              } catch (\Exception $e) {
                $recentNotifications = collect();
              }
            @endphp

            @forelse($recentNotifications as $notification)
            <li class="notification-item" data-id="{{ $notification->id }}">
              <i class="{{ $notification->icon }}"></i>
              <div>
                <h4>{{ $notification->title }}</h4>
                <p>{{ $notification->message }}</p>
                <p>{{ $notification->created_at->diffForHumans() }}</p>
              </div>
              @if(!$notification->is_read)
                <button class="btn btn-sm btn-link mark-read-btn" onclick="markAsRead({{ $notification->id }})">
                  <i class="bi bi-check"></i>
                </button>
              @endif
            </li>
            @if(!$loop->last)
            <li>
              <hr class="dropdown-divider">
            </li>
            @endif
            @empty
            <li class="notification-item">
              <div>
                <p>No notifications yet.</p>
              </div>
            </li>
            @endforelse

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="/staff/notifications">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @auth
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/staff/profile/{{ Auth::user()->id }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ '/logout' }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
            @endauth

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <script>
    function markAsRead(notificationId) {
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
                // Hide the mark read button
                const button = event.target.closest('.mark-read-btn');
                if (button) {
                    button.style.display = 'none';
                }
                
                // Update badge count
                const badge = document.querySelector('.badge-number');
                if (badge) {
                    let count = parseInt(badge.textContent) - 1;
                    if (count <= 0) {
                        badge.style.display = 'none';
                    } else {
                        badge.textContent = count;
                    }
                }
            }
        })
        .catch(error => {
            console.error('Error marking notification as read:', error);
        });
    }
  </script>

  <!-- Tambahkan script polling di sini -->
  <script>
  let notificationPollingInterval;

  // Fungsi untuk memulai polling
  function startNotificationPolling() {
      // Cek notifikasi setiap 30 detik
      notificationPollingInterval = setInterval(function() {
          checkForNewNotifications();
      }, 500000); // 1 menit, (1000 = 1 detik)
  }

  // Fungsi untuk mengecek notifikasi baru
  function checkForNewNotifications() {
      fetch('/staff/notifications/unread-count')
          .then(response => response.json())
          .then(data => {
              updateNotificationBadge(data.count);
              
              if (data.count > 0) {
                  loadRecentNotifications();
              }
          })
          .catch(error => {
              console.log('Error checking notifications:', error);
          });
  }

  // Fungsi untuk update badge
  function updateNotificationBadge(count) {
      const badge = document.querySelector('.badge-number');
      const headerText = document.querySelector('.dropdown-header');
      
      if (count > 0) {
          if (badge) {
              badge.textContent = count;
              badge.style.display = 'inline';
          } else {
              // Buat badge baru jika belum ada
              const bellIcon = document.querySelector('.bi-bell').parentNode;
              const newBadge = document.createElement('span');
              newBadge.className = 'badge bg-primary badge-number';
              newBadge.textContent = count;
              bellIcon.appendChild(newBadge);
          }
          
          // Update header dropdown
          if (headerText) {
              headerText.innerHTML = `You have ${count} new notification${count > 1 ? 's' : ''} <a href="/staff/notifications"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>`;
          }
      } else {
          if (badge) {
              badge.style.display = 'none';
          }
          
          if (headerText) {
              headerText.innerHTML = 'No new notifications <a href="/staff/notifications"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>';
          }
      }
  }

  // Fungsi untuk load notifikasi terbaru
  function loadRecentNotifications() {
      fetch('/staff/notifications/recent')
          .then(response => response.json())
          .then(data => {
              updateNotificationDropdown(data.notifications);
          })
          .catch(error => {
              console.log('Error loading recent notifications:', error);
          });
  }

  // Fungsi untuk update dropdown content
  function updateNotificationDropdown(notifications) {
      const dropdownMenu = document.querySelector('.dropdown-menu.notifications');
      
      // Hapus item notifikasi lama (kecuali header dan footer)
      const existingItems = dropdownMenu.querySelectorAll('.notification-item');
      existingItems.forEach(item => item.remove());
      
      const existingDividers = dropdownMenu.querySelectorAll('.dropdown-divider');
      existingDividers.forEach(divider => divider.remove());
      
      // Tambahkan notifikasi baru
      const headerElement = dropdownMenu.querySelector('.dropdown-header');
      const footerElement = dropdownMenu.querySelector('.dropdown-footer');
      
      if (notifications.length > 0) {
          notifications.forEach((notification, index) => {
              // Buat divider
              const divider = document.createElement('li');
              divider.innerHTML = '<hr class="dropdown-divider">';
              footerElement.parentNode.insertBefore(divider, footerElement);
              
              // Buat item notifikasi
              const notificationItem = document.createElement('li');
              notificationItem.className = 'notification-item';
              notificationItem.setAttribute('data-id', notification.id);
              
              notificationItem.innerHTML = `
                  <i class="${notification.icon}"></i>
                  <div>
                      <h4>${notification.title}</h4>
                      <p>${notification.message}</p>
                      <p>${timeAgo(notification.created_at)}</p>
                  </div>
                  ${!notification.is_read ? `<button class="btn btn-sm btn-link mark-read-btn" onclick="markAsRead(${notification.id})"><i class="bi bi-check"></i></button>` : ''}
              `;
              
              footerElement.parentNode.insertBefore(notificationItem, footerElement);
          });
      } else {
          // Jika tidak ada notifikasi
          const divider = document.createElement('li');
          divider.innerHTML = '<hr class="dropdown-divider">';
          footerElement.parentNode.insertBefore(divider, footerElement);
          
          const noNotification = document.createElement('li');
          noNotification.className = 'notification-item';
          noNotification.innerHTML = '<div><p>No notifications yet.</p></div>';
          footerElement.parentNode.insertBefore(noNotification, footerElement);
      }
      
      // Tambahkan divider sebelum footer
      const finalDivider = document.createElement('li');
      finalDivider.innerHTML = '<hr class="dropdown-divider">';
      footerElement.parentNode.insertBefore(finalDivider, footerElement);
  }

  // Fungsi helper untuk format waktu
  function timeAgo(dateString) {
      const now = new Date();
      const past = new Date(dateString);
      const diffInSeconds = Math.floor((now - past) / 1000);
      
      if (diffInSeconds < 60) return 'just now';
      if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' minutes ago';
      if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' hours ago';
      return Math.floor(diffInSeconds / 86400) + ' days ago';
  }

  // Update existing markAsRead function
  function markAsRead(notificationId) {
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
              // Hide the mark read button
              const button = event.target.closest('.mark-read-btn');
              if (button) {
                  button.style.display = 'none';
              }
              
              // Refresh notification count
              checkForNewNotifications();
          }
      })
      .catch(error => {
          console.error('Error marking notification as read:', error);
      });
  }

  // Mulai polling saat halaman dimuat
  document.addEventListener('DOMContentLoaded', function() {
      startNotificationPolling();
      
      // Cek notifikasi langsung saat halaman dimuat
      checkForNewNotifications();
  });

  // Hentikan polling saat halaman akan ditutup
  window.addEventListener('beforeunload', function() {
      if (notificationPollingInterval) {
          clearInterval(notificationPollingInterval);
      }
  });
  </script>