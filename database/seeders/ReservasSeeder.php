<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
				"client_name" => "Martin Lokee",
				"dni" => 1254789,
				"phone" => 12345678750,
				"email" => "mlokew@examplfe.com",
				"brand" => "Toyota",
				"model" => "Corolla",
				"year" => 2027,
				"capacity" => "8 people",
				"price" => "$55/day",
				"pickup_date" => "2024-04-20",
				"return_date" => "2024-05-05",
				"pickup_location" => "Airport",
				"return_location" => "City Center",
				"status" => "pending",
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
        	],
			[
				"client_name" => "Lucy Aranda",
				"dni" => 1254779,
				"phone" => 12344678750,
				"email" => "laranda@examplfe.com",
				"brand" => "Lexus",
				"model" => "Corolla",
				"year" => 2024,
				"capacity" => "4 people",
				"price" => "$75/day",
				"pickup_date" => "2024-04-20",
				"return_date" => "2024-05-05",
				"pickup_location" => "Airport",
				"return_location" => "Panama City",
				"status" => "accepted",
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
        	],
			[
				"client_name" => "John Doe",
				"dni" => 987654321,
				"phone" => 12344678750,
				"email" => "johndoe@example.com",
				"brand" => "Lexus",
				"model" => "Corolla",
				"year" => 2023,
				"capacity" => "5 people",
				"price" => "$60/day",
				"pickup_date" => "2024-04-20",
				"return_date" => "2024-05-05",
				"pickup_location" => "Airport",
				"return_location" => "Panama City",
				"status" => "pending",
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
        	],
			[
				"client_name" => "Alice Smith",
				"dni" => 123456789,
				"phone" => 12344678750,
				"email" => "alice.smith@example.com",
				"brand" => "Ford",
				"model" => "Fusion",
				"year" => 2022,
				"capacity" => "7 people",
				"price" => "$40/day",
				"pickup_date" => "2024-04-20",
				"return_date" => "2024-05-05",
				"pickup_location" => "Airport",
				"return_location" => "Panama City",
				"status" => "pending",
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
        	],
        ]);
    }
}
