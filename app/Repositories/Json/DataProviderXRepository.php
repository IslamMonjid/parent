<?php

namespace App\Repositories\Json;

use App\Repositories\Interfaces\DataProviderXRepositoryInterface;
use App\Repositories\Interfaces\DataProviderRepositoryInterface;
use App\Traits\JsonDataProviderTrait;

class DataProviderXRepository implements DataProviderRepositoryInterface, DataProviderXRepositoryInterface
{
    use JsonDataProviderTrait;

    /**      
     * @var provider      
     */  
    protected $provider;  

    /**      
     * @var status      
     */  
    protected $status;  

    /**
     * DataProviderXRepository constructor.
     */
    public function __construct()
    {
        $this->provider = 'DataProviderX.json';
        $this->status =[
            '1'  => 'authorised',
            '2'  => 'decline',
            '3'  => 'refunded'
        ];
    }

    /**
     * @return Array
     */
    public function all() :array
    {
        $data = $this->getAll($this->provider);

        $data = array_map(function($item) {
            return [
                'parent-email'   => $item->parentEmail,
                'balance'         => $item->parentAmount,
                'currency'       => $item->Currency,
                'statusCode'         => $this->status[$item->statusCode],
                'date'           => $item->registerationDate,
                'id'             => $item->parentIdentification,
                'provider'       => 'DataProviderX',
            ];
        }, $data);

        return $data;
    }
}
