<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    public function store(CreateReservation $request)
    {
        try {
        $reservation = new Reservation();
        $reservation->client_name = $request->client_name;
        $reservation->dni = $request->dni;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->brand = $request->brand;
        $reservation->model = $request->model;
        $reservation->year = $request->year;
        $reservation->capacity = $request->capacity;
        $reservation->price = $request->price;
        $reservation->pickup_date = $request->pickup_date;
        $reservation->return_date = $request->return_date;
        $reservation->pickup_location = $request->pickup_location;
        $reservation->return_location = $request->return_location;
        $reservation->status = $request->status;
        $reservation->save();

        return response()->json([
            'status' => true,
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error creating reservation', 'error' => $e->getMessage()], 500);
    }
    }
    

    public function show(Reservation $id)
    {
        return $id;
    }


    public function update(Request $request, $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->client_name = $request->client_name;
            $reservation->dni = $request->dni;
            $reservation->phone = $request->phone;
            $reservation->email = $request->email;
            $reservation->brand = $request->brand;
            $reservation->model = $request->model;
            $reservation->year = $request->year;
            $reservation->capacity = $request->capacity;
            $reservation->price = $request->price;
            $reservation->pickup_date = $request->pickup_date;
            $reservation->return_date = $request->return_date;
            $reservation->pickup_location = $request->pickup_location;
            $reservation->return_location = $request->return_location;
            $reservation->status = $request->status;
            $reservation->update();
    
            return response()->json([
                'status' => true,
                'message' => 'Reservation updated successfully',
                'reservation' => $reservation
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating reservation', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if (is_null($reservation)) {
            return response()->json('Reservation Not Found', 404);
        }
        $reservation->delete();

        return response()->json([
            'status' => true,
            'message' => 'Reservation succesfully deleted.'
        ], 200);
    }
}
