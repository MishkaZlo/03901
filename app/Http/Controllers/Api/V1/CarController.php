<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CarSearchRequest;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;

class CarController extends BaseController
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getCars(CarSearchRequest $request): JsonResponse
    {
        $criteria = (new CarService)->getCriteria($request->input());
        $cars = $this->carRepository->getCars($criteria);

        return $this->sendResponse($cars);
    }

}
