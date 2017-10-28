<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakApiTest extends TestCase
{
    use MakeTernakTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTernak()
    {
        $ternak = $this->fakeTernakData();
        $this->json('POST', '/api/v1/ternaks', $ternak);

        $this->assertApiResponse($ternak);
    }

    /**
     * @test
     */
    public function testReadTernak()
    {
        $ternak = $this->makeTernak();
        $this->json('GET', '/api/v1/ternaks/'.$ternak->id);

        $this->assertApiResponse($ternak->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTernak()
    {
        $ternak = $this->makeTernak();
        $editedTernak = $this->fakeTernakData();

        $this->json('PUT', '/api/v1/ternaks/'.$ternak->id, $editedTernak);

        $this->assertApiResponse($editedTernak);
    }

    /**
     * @test
     */
    public function testDeleteTernak()
    {
        $ternak = $this->makeTernak();
        $this->json('DELETE', '/api/v1/ternaks/'.$ternak->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ternaks/'.$ternak->id);

        $this->assertResponseStatus(404);
    }
}
