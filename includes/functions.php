<?php
// functions.php

function sqlAllCustomers(): string
{
    return "SELECT customer_id, first_name, last_name, phone, email FROM customers ORDER BY last_name, first_name";
}

function sqlBikeRentals(): string
{
    return "SELECT * FROM rentals";
}

function sqlJoinRentalsCustomer(): string
{
    return "SELECT * FROM rentals 
            JOIN customers ON rentals.customer_id = customers.customer_id";
}

function sqlJoinRentalsBikes(): string
{
    return "SELECT * FROM rentals 
            JOIN bikes ON rentals.bike_id = bikes.bike_id";
}

function sqlMorningRentals(): string
{
    return "SELECT * FROM rentals 
            JOIN customers ON rentals.customer_id = customers.customer_id 
            JOIN bikes ON rentals.bike_id = bikes.bike_id
            WHERE rentals.start_time < '12:00:00'";
}

function sqlOpenRentals(): string
{
    return "SELECT * FROM bikes
            JOIN rentals ON bikes.bike_id = rentals.bike_id
            JOIN types ON bikes.type = types.type_id
            WHERE rentals.end_time IS NULL";
}
function sqlAllJoins(): string // Joins all relevant tables
{
    return "SELECT * FROM rentals 
            JOIN customers ON rentals.customer_id = customers.customer_id 
            JOIN bikes ON rentals.bike_id = bikes.bike_id
            JOIN types ON bikes.type_id = types.type_id";
}

function sqlAllBikes(): string
{
    return "SELECT * FROM bikes ORDER BY model";
}

function sqlAllBikesByPrice(): string
{
    return "SELECT * FROM bikes ORDER BY price_per_hour DESC";
}

function sqlAllBikesByType(): string
{
    return "SELECT bikes.*, types.type_name FROM bikes 
            JOIN types ON bikes.type = types.type_id
            ORDER BY types.type_name, bikes.model";
}

function sqlTop3Bikes(): string
{
    return "SELECT bikes.bike_id, bikes.model, COUNT(rentals.rental_id) AS rental_count
            FROM bikes
            JOIN rentals ON bikes.bike_id = rentals.bike_id
            GROUP BY bikes.bike_id, bikes.model
            ORDER BY rental_count DESC
            LIMIT 3";
}


