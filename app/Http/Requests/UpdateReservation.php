<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // si existe una reservacion en la ruta, se obtiene el id de la misma
        $reservationId = $this->route('reservation') ? $this->route('reservation')->id : null;

        return [
            'client_name' => 'required|string',
            //'dni' => 'required|string|max:15|unique:reservations,dni,' . $reservationId,
            'dni' => 'required|string|max:15|unique:reservations,dni,' . $reservationId . ',id',
            'phone' => 'required|numeric',
            'email' => 'required|string|unique:reservations,email,' . $reservationId . ',id',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|date_format:Y-m-d|after_or_equal:pickup_date',
            'pickup_location' => 'required',
            'return_location' => 'required',
            'status' => 'required|string|in:accepted,pending,canceled',
        ];
    }

    //por cada validacion de cada campo se debe crear un mensaje
    public function messages(): array
    {
        return [
            'client_name.required' => "Client Name is required",
            'client_name.string' => "Client Name can only contain letters",

            'dni.required' => "Client ID is required",
            'dni.string' => "Client ID can't contain special characters",
            'dni.max' => "Client ID can only contain max 15 characters",
            'dni.unique' => "Client ID most be unique",

            'phone.required' => "Client Phone is required",
            'phone.numeric' => "Client Phone must be numeric.",
            'phone.max' => "Client Phone can only contain max 20 numbers",

            'email.required' => "Client Email is required",
            'email.string' => "Client Email can only contain letters and numbers",
            'email.unique' => "Client Email most be unique",

            'brand.required' => "Vehicle Brand is required",

            'model.required' => "Vehicle Model is required",

            'year.required' => "Vehicle Year is required",

            'capacity.required' => "Vehicle Capacity is required",

            'price.required' => "Vehicle Price is required",

            'pickup_date.required' => "Pickup Date is required",
            'pickup_date.date' => "Pickup Date most be a valid date",

            'return_date.required' => "Return Date is required and must be a valid date",

            'pickup_date.after_or_equal' => 'The pickup date must be after or equal to the current date.',

            'return_date.after_or_equal' => 'The return date must be after or equal to the pickup date.',

            'pickup_location.required' => "Pickup Location is required",

            'return_location.required' => "Return Location is required",       

            'status.required' => "Status is required",
            'status.string' => "Status must be 'pending', 'accepted' or 'rejected'",
            'status.in' => "Status must be 'pending', 'accepted' or 'rejected'",
        ];
    }

    public function attributes(): array
    {
        return [
            'client_name' => 'client name',
            'dni' => 'client id',
            'phone' => 'client phone',
            'email' => 'client email',
            'brand' => 'vehicle brand',
            'model' => 'vehicle model',
            'year' => 'vehicle year',
            'capacity' => 'vehicle capacity',
            'price' => 'vehicle price',
            'pickup_date' => 'pickup date',
            'return_date' => 'return date',
            'pickup_location' => 'pickup location',
            'return_location' => 'return location',
            'status' => 'status'
        ];
    }
}
