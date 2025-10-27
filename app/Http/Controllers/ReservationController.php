<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('room')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'Available')->get();
        return view('reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'guestName' => 'required',
            'guestEmail' => 'required|email',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date|after:checkInDate',
        ]);

        $reservation = Reservation::create($request->all());

        $room = Room::find($request->room_id);
        $room->status = 'Reserved';
        $room->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'rooms'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'guestName' => 'required',
            'guestEmail' => 'required|email',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date|after:checkInDate',
        ]);

        // free old room
        $oldRoom = $reservation->room;
        $oldRoom->status = 'Available';
        $oldRoom->save();

        $reservation->update($request->all());

        $newRoom = Room::find($request->room_id);
        $newRoom->status = 'Reserved';
        $newRoom->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
    }

    public function destroy(Reservation $reservation)
    {
        $room = $reservation->room;
        $room->status = 'Available';
        $room->save();

        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation cancelled!');
    }
}



