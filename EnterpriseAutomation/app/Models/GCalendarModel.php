<?php namespace App\Models;

use CodeIgniter\Model;

class GCalendarModel extends Model
{
    /**
     * table name
     */
    protected $table = "google_calendar";
    protected $primaryKey = "id";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'API_KEY',
        'GCAL_ID',
        'CLIENT_ID'
    ];
}