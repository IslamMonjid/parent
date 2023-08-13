<?php

namespace App\Repositories\Json;

use App\Repositories\Interfaces\DataProviderYRepositoryInterface;
use App\Repositories\Interfaces\DataProviderRepositoryInterface;
use App\Traits\JsonDataProviderTrait;

class DataProviderYRepository implements DataProviderRepositoryInterface, DataProviderYRepositoryInterface
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
     * DataProviderYRepository constructor.
     */
    public function __construct()
    {
        $this->provider = 'DataProviderY.json';

        $this->status =[
            '100'  => 'authorised',
            '200'  => 'decline',
            '300'  => 'refunded'
        ];
    }

    /**
     * @return array
     */
    public function all() :array
    {
        $data = $this->getAll($this->provider);

        $data = array_map(function($item) {
            return [
                'parent-email'   => $item->email,
                'balance'        => $item->balance,
                'currency'       => $item->currency,
                'statusCode'     => $this->status[$item->status],
                'date'           => \DateTime::createFromFormat('d/m/Y', $item->created_at)->format('Y-m-d'),
                'id'             => $item->id,
                'provider'       => 'DataProviderY',
            ];
        }, $data);

        return $data;
    }
}
