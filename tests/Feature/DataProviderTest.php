<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DataProviderTest extends TestCase
{

    public function test_the_users_endpoint_no_filters()
    {
        $response = $this->getJson('api/v1/users');

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data' ,10)
        );
    }

    public function test_the_users_endpoint_json_attributes()
    {
        $response = $this->getJson('api/v1/users');

        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll([
                "data"])
                ->has('data.0', fn (AssertableJson $json) =>
                $json->hasAll(["parent-email",
                "balance",
                "currency",
                "statusCode",
                "date",
                "id",
                "provider"])
                )
        );
    }

    public function test_the_users_endpoint_status_filter_statusCode()
    {
        $response = $this->getJson('api/v1/users?statusCode=authorised');

        $response->assertJson(fn (AssertableJson $json) =>
        $json->has('data', 4)
             ->has('data.0', fn (AssertableJson $json) =>
                $json->where('statusCode', 'authorised')
                     ->etc()
             )
             ->has('data.1', fn (AssertableJson $json) =>
                $json->where('statusCode', 'authorised')
                     ->etc()
             )
             ->has('data.2', fn (AssertableJson $json) =>
                $json->where('statusCode', 'authorised')
                     ->etc()
             )
             ->has('data.3', fn (AssertableJson $json) =>
                $json->where('statusCode', 'authorised')
                     ->etc()
             )
        );
    }

    public function test_the_users_endpoint_status_filter_provider()
    {
        $response = $this->getJson('api/v1/users?provider=DataProviderX');

        $response->assertJson(fn (AssertableJson $json) =>
        $json->has('data', 5)
             ->has('data.0', fn (AssertableJson $json) =>
                $json->where('provider', 'DataProviderX')
                     ->etc()
             )
             ->has('data.1', fn (AssertableJson $json) =>
                $json->where('provider', 'DataProviderX')
                     ->etc()
             )
             ->has('data.2', fn (AssertableJson $json) =>
                $json->where('provider', 'DataProviderX')
                     ->etc()
             )
             ->has('data.3', fn (AssertableJson $json) =>
                $json->where('provider', 'DataProviderX')
                     ->etc()
             )
             ->has('data.4', fn (AssertableJson $json) =>
                $json->where('provider', 'DataProviderX')
                     ->etc()
             )
        );
    }

    public function test_the_users_endpoint_status_filter_currency()
    {
        $response = $this->getJson('api/v1/users?currency=USD');

        $response->assertJson(fn (AssertableJson $json) =>
        $json->has('data', 5)
             ->has('data.0', fn (AssertableJson $json) =>
                $json->where('currency', 'USD')
                     ->etc()
             )
             ->has('data.1', fn (AssertableJson $json) =>
                $json->where('currency', 'USD')
                     ->etc()
             )
             ->has('data.2', fn (AssertableJson $json) =>
                $json->where('currency', 'USD')
                     ->etc()
             )
             ->has('data.3', fn (AssertableJson $json) =>
                $json->where('currency', 'USD')
                     ->etc()
             )
             ->has('data.4', fn (AssertableJson $json) =>
                $json->where('currency', 'USD')
                     ->etc()
             )
        );
    }
}
