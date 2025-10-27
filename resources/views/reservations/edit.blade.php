@extends('layouts.app')

@section('content')
<h1>Edit Reservation</h1>

<form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Room:</label>
    <select name="room_id" required>
        @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ $reservation->room_id == $room->id ? 'selected' : '' }}>
                {{ $room->roomNumber }} - {{ $room->type }} ({{ $room->status }})
            </option>
        @endforeach
    </select><br>

    <input type="text" name="guestName" value="{{ $reservation->guestName }}" required><br>
    <input type="email" name="guestEmail" value="{{ $reservation->guestEmail }}" required><br>
    <input type="date" name="checkInDate" value="{{ $reservation->checkInDate }}" required><br>
    <input type="date" name="checkOutDate" value="{{ $reservation->checkOutDate }}" required><br>

    <button type="submit">Update</button>
</form>
@endsection
