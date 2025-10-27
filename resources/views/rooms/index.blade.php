@extends('layouts.app')

@section('content')
<h1>Rooms List</h1>
<a href="{{ route('rooms.create') }}">Add Room</a>
<table>
    <tr>
        <th>Room Number</th>
        <th>Type</th>
        <th>Capacity</th>
        <th>Price</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($rooms as $room)
    <tr>
        <td>{{ $room->roomNumber }}</td>
        <td>{{ $room->type }}</td>
        <td>{{ $room->capacity }}</td>
        <td>{{ $room->pricePerNight }}</td>
        <td>{{ $room->status }}</td>
        <td>
            <a href="{{ route('rooms.edit', $room->id) }}">Edit</a>
            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
