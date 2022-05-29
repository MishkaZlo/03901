<?php
declare(strict_types=1);

namespace App\Criteria;

use phpDocumentor\Reflection\Types\This;

class CarCriteria
{
    /**
     * @var string
     */
    protected $q_string;

    /**
     * @var bool
     */
    protected $filter_only_using;

    /**
     * @var bool
     */
    protected $q_param_on_mark;

    /**
     * @var bool
     */
    protected $q_param_on_model;

    /**
     * @var bool
     */
    protected $q_param_on_driver_name;

    /**
     * @var bool
     */
    protected $q_sort_by_last_end_time;

    /**
     * @var bool
     */
    protected $q_sort_by_car_mark;

    /**
     * @var bool
     */
    protected $q_sort_by_car_model;

    /**
     * @var string
     */
    protected $sort_mode;

    public function __construct(array $searchParams = [])
    {
        //TODO добавить валидацию доступных вариантов сортировки, фильтров, дефолтные поля для сортировки

        $this->q_string = $searchParams['query'] ?: '';
        $this->filter_only_using = strtoupper($searchParams['filter']['only_using']) === 'Y';

        $this->q_param_on_mark = in_array('mark', $searchParams['query_params']);
        $this->q_param_on_model = in_array('model', $searchParams['query_params']);
        $this->q_param_on_driver_name = in_array('driver_name', $searchParams['query_params']);

        $this->q_sort_by_last_end_time = $searchParams['sort'] === 'start_time';
        $this->q_sort_by_car_mark = $searchParams['sort'] === 'mark';
        $this->q_sort_by_car_model = $searchParams['sort'] === 'model';
        $this->sort_mode = $searchParams['sort_mode'] ?: 'asc';
    }

    public function getQueryString(): string
    {

        return $this->q_string;
    }

    public function isOnlyUsingFilter(): bool
    {

        return $this->filter_only_using;
    }

    public function isSearchOnMark(): bool
    {

        return $this->q_param_on_mark;
    }

    public function isSearchOnModel(): bool
    {

        return $this->q_param_on_model;
    }

    public function isSearchOnDriverName(): bool
    {

        return $this->q_param_on_driver_name;
    }

    public function isSortByLastEndTime(): bool
    {

        return $this->q_sort_by_last_end_time;
    }

    public function isSortByCarMark(): bool
    {

        return $this->q_sort_by_car_mark;
    }

    public function isSortByCarModel(): bool
    {

        return $this->q_sort_by_car_model;
    }

    public function getSortMode(): string
    {

        return $this->sort_mode;
    }
}
