<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiInvestasiApiTest extends TestCase
{
    use MakeTransaksiInvestasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->fakeTransaksiInvestasiData();
        $this->json('POST', '/api/v1/transaksiInvestasis', $transaksiInvestasi);

        $this->assertApiResponse($transaksiInvestasi);
    }

    /**
     * @test
     */
    public function testReadTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $this->json('GET', '/api/v1/transaksiInvestasis/'.$transaksiInvestasi->id);

        $this->assertApiResponse($transaksiInvestasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $editedTransaksiInvestasi = $this->fakeTransaksiInvestasiData();

        $this->json('PUT', '/api/v1/transaksiInvestasis/'.$transaksiInvestasi->id, $editedTransaksiInvestasi);

        $this->assertApiResponse($editedTransaksiInvestasi);
    }

    /**
     * @test
     */
    public function testDeleteTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $this->json('DELETE', '/api/v1/transaksiInvestasis/'.$transaksiInvestasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transaksiInvestasis/'.$transaksiInvestasi->id);

        $this->assertResponseStatus(404);
    }
}
