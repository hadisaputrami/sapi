<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakNonInvestasiApiTest extends TestCase
{
    use MakeTernakNonInvestasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->fakeTernakNonInvestasiData();
        $this->json('POST', '/api/v1/ternakNonInvestasis', $ternakNonInvestasi);

        $this->assertApiResponse($ternakNonInvestasi);
    }

    /**
     * @test
     */
    public function testReadTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $this->json('GET', '/api/v1/ternakNonInvestasis/'.$ternakNonInvestasi->id);

        $this->assertApiResponse($ternakNonInvestasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $editedTernakNonInvestasi = $this->fakeTernakNonInvestasiData();

        $this->json('PUT', '/api/v1/ternakNonInvestasis/'.$ternakNonInvestasi->id, $editedTernakNonInvestasi);

        $this->assertApiResponse($editedTernakNonInvestasi);
    }

    /**
     * @test
     */
    public function testDeleteTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $this->json('DELETE', '/api/v1/ternakNonInvestasis/'.$ternakNonInvestasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ternakNonInvestasis/'.$ternakNonInvestasi->id);

        $this->assertResponseStatus(404);
    }
}
