<?php

namespace App\Repositories;

use App\Criteria\CarCriteria;
use App\Http\Resources\CarResource;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Models\Car;

class CarRepository implements CarRepositoryInterface
{
    public function getCars(CarCriteria $criteria)
    {
        $query = Car::with('drivers');

        if ($criteria->isSortByLastEndTime()) {
            $query->join('car_driver', 'cars.id', '=', 'car_driver.car_id')->
            join('drivers', 'drivers.id', '=', 'car_driver.driver_id')->
            orderBy('car_driver.start_time', $criteria->getSortMode());
        }

        if ($criteria->isSortByCarMark()){
            $query->orderBy('mark', $criteria->getSortMode());
        }

        if ($criteria->isSortByCarModel()){
            $query->orderBy('model', $criteria->getSortMode());
        }

        if ($criteria->isOnlyUsingFilter()) {
            $query->whereHas('drivers', function ($q) {
                $q->whereNull('end_time');
            });
        }

        if ($criteria->getQueryString()) {
            $query->Where(function ($query) use ($criteria) {
                if ($criteria->isSearchOnMark()) {
                    $query->Where('mark', 'like', '%' . $criteria->getQueryString() . '%');
                }

                if ($criteria->isSearchOnModel()) {
                    $query->orWhere('model', 'like', '%' . $criteria->getQueryString() . '%');
                }

                if ($criteria->isSearchOnDriverName()) {
                    $query->orWhereHas('drivers', function ($q) use ($criteria) {
                        $q->Where('name', 'LIKE', '%' . $criteria->getQueryString() . '%');
                    });
                }
            });
        }

        return CarResource::collection($query->get());
    }

}
