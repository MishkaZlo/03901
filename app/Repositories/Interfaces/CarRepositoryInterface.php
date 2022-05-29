<?php

namespace App\Repositories\Interfaces;

use App\Criteria\CarCriteria;

interface CarRepositoryInterface
{
    public function getCars(CarCriteria $criteria);
}
