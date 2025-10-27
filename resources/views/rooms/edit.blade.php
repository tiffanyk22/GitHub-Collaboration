@extends('layouts.app')


@section('content')
<h1>Edit Room</h1>
<form action="{{ route('rooms.update', $room->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="roomNumber" value="{{ $room->roomNumber }}" required><br>
    <input type="text" name="type" value="{{ $room->type }}" required><br>
    <input type="number" name="capacity" value="{{ $room->capacity }}" required><br>
    <input type="text" name="pricePerNight" value="{{ $room->pricePerNight }}" required><br>
    <select name="status">
        <option value="Available" {{ $room->status == 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Occupied" {{ $room->status == 'Occupied' ? 'selected' : '' }}>Occupied</option>
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
