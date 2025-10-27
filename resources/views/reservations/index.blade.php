@extends('layouts.app')

@section('content')
<h1>Reservations</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('reservations.create') }}">Add Reservation</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Room</th>
            <th>Guest</th>
            <th>Email</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->room->roomNumber }} ({{ $reservation->room->type }})</td>
            <td>{{ $reservation->guestName }}</td>
            <td>{{ $reservation->guestEmail }}</td>
            <td>{{ $reservation->checkInDate }}</td>
            <td>{{ $reservation->checkOutDate }}</td>
            <td>
                <a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="danger">Cancel</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No reservations yet.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
