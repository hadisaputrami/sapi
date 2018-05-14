<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsuransiApiTest extends TestCase
{
    use MakeAsuransiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAsuransi()
    {
        $asuransi = $this->fakeAsuransiData();
        $this->json('POST', '/api/v1/asuransis', $asuransi);

        $this->assertApiResponse($asuransi);
    }

    /**
     * @test
     */
    public function testReadAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $this->json('GET', '/api/v1/asuransis/'.$asuransi->id);

        $this->assertApiResponse($asuransi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $editedAsuransi = $this->fakeAsuransiData();

        $this->json('PUT', '/api/v1/asuransis/'.$asuransi->id, $editedAsuransi);

        $this->assertApiResponse($editedAsuransi);
    }

    /**
     * @test
     */
    public function testDeleteAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $this->json('DELETE', '/api/v1/asuransis/'.$asuransi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/asuransis/'.$asuransi->id);

        $this->assertResponseStatus(404);
    }
}
