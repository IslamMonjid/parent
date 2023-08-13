<?php

namespace App\Services;

use App\Repositories\Interfaces\DataProviderXRepositoryInterface;
use App\Repositories\Interfaces\DataProviderYRepositoryInterface;
use App\Services\Interfaces\DataProviderServiceInterface;
use App\Traits\DataFiltrationTrait;

class DataProviderService implements DataProviderServiceInterface
{
    use DataFiltrationTrait;

    private $dataProviderXRepository;
    private $dataProviderYRepository;

    public function __construct(DataProviderXRepositoryInterface $dataProviderXRepository, DataProviderYRepositoryInterface $dataProviderYRepository)
    {
        $this->providers = [$dataProviderXRepository, $dataProviderYRepository];
    }

    public function all($filters)
    {
        $data = [];

        foreach ($this->providers as $provider) {
            $data = array_merge($data, $provider->all());
        }

        if(!empty($filters)){
            $data = $this->filter($filters, $data);
        }
        
        return $data;
    }


}
