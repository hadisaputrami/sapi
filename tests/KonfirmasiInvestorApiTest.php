<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KonfirmasiInvestorApiTest extends TestCase
{
    use MakeKonfirmasiInvestorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->fakeKonfirmasiInvestorData();
        $this->json('POST', '/api/v1/konfirmasiInvestors', $konfirmasiInvestor);

        $this->assertApiResponse($konfirmasiInvestor);
    }

    /**
     * @test
     */
    public function testReadKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $this->json('GET', '/api/v1/konfirmasiInvestors/'.$konfirmasiInvestor->id);

        $this->assertApiResponse($konfirmasiInvestor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $editedKonfirmasiInvestor = $this->fakeKonfirmasiInvestorData();

        $this->json('PUT', '/api/v1/konfirmasiInvestors/'.$konfirmasiInvestor->id, $editedKonfirmasiInvestor);

        $this->assertApiResponse($editedKonfirmasiInvestor);
    }

    /**
     * @test
     */
    public function testDeleteKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $this->json('DELETE', '/api/v1/konfirmasiInvestors/'.$konfirmasiInvestor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/konfirmasiInvestors/'.$konfirmasiInvestor->id);

        $this->assertResponseStatus(404);
    }
}
