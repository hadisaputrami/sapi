<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestorHasTransaksiInvestasiApiTest extends TestCase
{
    use MakeInvestorHasTransaksiInvestasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->fakeInvestorHasTransaksiInvestasiData();
        $this->json('POST', '/api/v1/investorHasTransaksiInvestasis', $investorHasTransaksiInvestasi);

        $this->assertApiResponse($investorHasTransaksiInvestasi);
    }

    /**
     * @test
     */
    public function testReadInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $this->json('GET', '/api/v1/investorHasTransaksiInvestasis/'.$investorHasTransaksiInvestasi->id);

        $this->assertApiResponse($investorHasTransaksiInvestasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $editedInvestorHasTransaksiInvestasi = $this->fakeInvestorHasTransaksiInvestasiData();

        $this->json('PUT', '/api/v1/investorHasTransaksiInvestasis/'.$investorHasTransaksiInvestasi->id, $editedInvestorHasTransaksiInvestasi);

        $this->assertApiResponse($editedInvestorHasTransaksiInvestasi);
    }

    /**
     * @test
     */
    public function testDeleteInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $this->json('DELETE', '/api/v1/investorHasTransaksiInvestasis/'.$investorHasTransaksiInvestasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/investorHasTransaksiInvestasis/'.$investorHasTransaksiInvestasi->id);

        $this->assertResponseStatus(404);
    }
}
