<?php
declare(strict_types=1);

namespace App\Services;

use App\Criteria\CarCriteria;

class CarService
{
    public function getCriteria(array $searchParams): CarCriteria
    {

        return new CarCriteria($searchParams);
    }
}
