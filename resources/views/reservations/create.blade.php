@extends('layouts.app')

@section('content')
<h1>Add Reservation</h1>

<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <label>Room:</label>
    <select name="room_id" required>
        @forelse($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->roomNumber }} - {{ $room->type }} ({{ $room->status }})</option>
        @empty
            <option disabled>No available rooms</option>
        @endforelse
    </select><br>

    <input type="text" name="guestName" placeholder="Guest Name" required><br>
    <input type="email" name="guestEmail" placeholder="Guest Email" required><br>
    <input type="date" name="checkInDate" required><br>
    <input type="date" name="checkOutDate" required><br>

    <button type="submit">Save</button>
</form>
@endsection
