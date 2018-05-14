<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiPenjualanHasStatusPenjualanApiTest extends TestCase
{
    use MakeTransaksiPenjualanHasStatusPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->fakeTransaksiPenjualanHasStatusPenjualanData();
        $this->json('POST', '/api/v1/transaksiPenjualanHasStatusPenjualans', $transaksiPenjualanHasStatusPenjualan);

        $this->assertApiResponse($transaksiPenjualanHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testReadTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $this->json('GET', '/api/v1/transaksiPenjualanHasStatusPenjualans/'.$transaksiPenjualanHasStatusPenjualan->id);

        $this->assertApiResponse($transaksiPenjualanHasStatusPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $editedTransaksiPenjualanHasStatusPenjualan = $this->fakeTransaksiPenjualanHasStatusPenjualanData();

        $this->json('PUT', '/api/v1/transaksiPenjualanHasStatusPenjualans/'.$transaksiPenjualanHasStatusPenjualan->id, $editedTransaksiPenjualanHasStatusPenjualan);

        $this->assertApiResponse($editedTransaksiPenjualanHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $this->json('DELETE', '/api/v1/transaksiPenjualanHasStatusPenjualans/'.$transaksiPenjualanHasStatusPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transaksiPenjualanHasStatusPenjualans/'.$transaksiPenjualanHasStatusPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
