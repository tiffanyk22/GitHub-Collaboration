@extends('layouts.app')

@section('content')
<h1>Add Room</h1>
<form action="{{ route('rooms.store') }}" method="POST">
    @csrf
    <input type="text" name="roomNumber" placeholder="Room Number" required><br>
    <input type="text" name="type" placeholder="Type" required><br>
    <input type="number" name="capacity" placeholder="Capacity" required><br>
    <input type="text" name="pricePerNight" placeholder="Price Per Night" required><br>
    <button type="submit">Save</button>
</form>
@endsection
