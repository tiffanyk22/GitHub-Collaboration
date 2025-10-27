<!DOCTYPE html>
<html>
<head>
    <title>Hotel Room Reservation - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>🏨 Tiffany Hotel</h2>
        <a href="{{ route('rooms.index') }}">🛏️ Rooms</a>
        <a href="{{ route('reservations.index') }}">📅 Reservations</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header class="topbar">
            <h1>Hotel Admin Panel</h1>
        </header>

        <div class="content-area">
            @yield('content')
        </div>

        <footer>
            &copy; 2025 Tiffany Hotel | Luxury Beyond Comfort ✨
        </footer>
    </div>
</body>
</html>
