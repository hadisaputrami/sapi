<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaketInvestasiApiTest extends TestCase
{
    use MakePaketInvestasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaketInvestasi()
    {
        $paketInvestasi = $this->fakePaketInvestasiData();
        $this->json('POST', '/api/v1/paketInvestasis', $paketInvestasi);

        $this->assertApiResponse($paketInvestasi);
    }

    /**
     * @test
     */
    public function testReadPaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $this->json('GET', '/api/v1/paketInvestasis/'.$paketInvestasi->id);

        $this->assertApiResponse($paketInvestasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $editedPaketInvestasi = $this->fakePaketInvestasiData();

        $this->json('PUT', '/api/v1/paketInvestasis/'.$paketInvestasi->id, $editedPaketInvestasi);

        $this->assertApiResponse($editedPaketInvestasi);
    }

    /**
     * @test
     */
    public function testDeletePaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $this->json('DELETE', '/api/v1/paketInvestasis/'.$paketInvestasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paketInvestasis/'.$paketInvestasi->id);

        $this->assertResponseStatus(404);
    }
}
