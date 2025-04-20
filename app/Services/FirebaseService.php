<?php

namespace App\Services;

class FirebaseService
{
    public function getUserStatistics()
    {
        return [
            'age' => [ '0-18' => 120, '19-35' => 340, '36-60' => 210 ],
            'gender' => [ 'male' => 320, 'female' => 350 ],
            'location' => [ 'CDMX' => 200, 'GDL' => 180, 'MTY' => 100 ]
        ];
    }
}
