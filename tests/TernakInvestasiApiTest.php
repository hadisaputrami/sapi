<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakInvestasiApiTest extends TestCase
{
    use MakeTernakInvestasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTernakInvestasi()
    {
        $ternakInvestasi = $this->fakeTernakInvestasiData();
        $this->json('POST', '/api/v1/ternakInvestasis', $ternakInvestasi);

        $this->assertApiResponse($ternakInvestasi);
    }

    /**
     * @test
     */
    public function testReadTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $this->json('GET', '/api/v1/ternakInvestasis/'.$ternakInvestasi->id);

        $this->assertApiResponse($ternakInvestasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $editedTernakInvestasi = $this->fakeTernakInvestasiData();

        $this->json('PUT', '/api/v1/ternakInvestasis/'.$ternakInvestasi->id, $editedTernakInvestasi);

        $this->assertApiResponse($editedTernakInvestasi);
    }

    /**
     * @test
     */
    public function testDeleteTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $this->json('DELETE', '/api/v1/ternakInvestasis/'.$ternakInvestasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ternakInvestasis/'.$ternakInvestasi->id);

        $this->assertResponseStatus(404);
    }
}
