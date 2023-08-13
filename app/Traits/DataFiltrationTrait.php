<?php

namespace App\Traits;

trait DataFiltrationTrait
{
    public function filter($filters, $data)
    {
        foreach($filters as $key => $value){
            switch ($key) {
                case 'provider':
                    $data = array_filter($data, function($item) use ($value) {
                        return $item['provider'] == $value;
                    });
                  break;

                case 'statusCode':
                    $data = array_filter($data, function($item) use ($value) {
                        return $item['statusCode'] == $value;
                    });
                  break;

                case 'balanceMin':
                    $data = array_filter($data, function($item) use ($value) {
                        return $item['balance'] >= $value;
                    });
                  break;

                case 'balanceMax':
                    $data = array_filter($data, function($item) use ($value) {
                        return $item['balance'] <= $value;
                    });
                  break;

                case 'currency':
                    $data = array_filter($data, function($item) use ($value) {
                        return $item['currency'] == $value;
                    });
                  break;
                

              }
        }
        return array_values($data);
    }
}
