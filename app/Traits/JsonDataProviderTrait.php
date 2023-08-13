<?php

namespace App\Traits;

trait JsonDataProviderTrait
{
    public function getAll($provider)
    {
        $data = \File::get(storage_path($this->provider));
        $data = json_decode($data);
        return $data;
    }
}
