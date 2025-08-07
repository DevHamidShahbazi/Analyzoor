<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Shetabit\Visitor\Models\Visit as BaseVisit;

class Visit extends BaseVisit
{
    /**
     * Get the create date attribute in Persian format.
     *
     * @return string
     */
    public function getCreateDateAttribute()
    {
        return Verta::instance($this->created_at)->format('Y/n/j');
    }

    /**
     * Get the create hour attribute in Persian format.
     *
     * @return string
     */
    public function getCreateHourAttribute()
    {
        return Verta::instance($this->created_at)->format('H:i');
    }
} 