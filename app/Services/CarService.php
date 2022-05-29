<?php

namespace App\Services;

use App\Criteria\CarCriteria;

class CarService
{
    public function getCriteria($searchParams): CarCriteria
    {

        return new CarCriteria($searchParams);
    }
}
