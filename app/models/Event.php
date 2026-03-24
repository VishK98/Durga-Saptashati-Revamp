<?php
namespace App\Models;

class Event
{
    public $id;
    public $title;
    public $date;
    public $location;

    public static function upcoming()
    {
        // Placeholder: return static sample data
        return [
            (object) ['id' => 1, 'title' => 'Health Camp', 'date' => '2025-10-01', 'location' => 'Delhi'],
            (object) ['id' => 2, 'title' => 'Education Drive', 'date' => '2025-11-15', 'location' => 'Mumbai'],
        ];
    }
}
