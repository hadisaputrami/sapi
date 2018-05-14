<?php

use App\Models\TransaksiPenjualanHasStatusPenjualan;
use App\Repositories\TransaksiPenjualanHasStatusPenjualanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiPenjualanHasStatusPenjualanRepositoryTest extends TestCase
{
    use MakeTransaksiPenjualanHasStatusPenjualanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransaksiPenjualanHasStatusPenjualanRepository
     */
    protected $transaksiPenjualanHasStatusPenjualanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transaksiPenjualanHasStatusPenjualanRepo = App::make(TransaksiPenjualanHasStatusPenjualanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->fakeTransaksiPenjualanHasStatusPenjualanData();
        $createdTransaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepo->create($transaksiPenjualanHasStatusPenjualan);
        $createdTransaksiPenjualanHasStatusPenjualan = $createdTransaksiPenjualanHasStatusPenjualan->toArray();
        $this->assertArrayHasKey('id', $createdTransaksiPenjualanHasStatusPenjualan);
        $this->assertNotNull($createdTransaksiPenjualanHasStatusPenjualan['id'], 'Created TransaksiPenjualanHasStatusPenjualan must have id specified');
        $this->assertNotNull(TransaksiPenjualanHasStatusPenjualan::find($createdTransaksiPenjualanHasStatusPenjualan['id']), 'TransaksiPenjualanHasStatusPenjualan with given id must be in DB');
        $this->assertModelData($transaksiPenjualanHasStatusPenjualan, $createdTransaksiPenjualanHasStatusPenjualan);
    }

    /**
     * @test read
     */
    public function testReadTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $dbTransaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepo->find($transaksiPenjualanHasStatusPenjualan->id);
        $dbTransaksiPenjualanHasStatusPenjualan = $dbTransaksiPenjualanHasStatusPenjualan->toArray();
        $this->assertModelData($transaksiPenjualanHasStatusPenjualan->toArray(), $dbTransaksiPenjualanHasStatusPenjualan);
    }

    /**
     * @test update
     */
    public function testUpdateTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $fakeTransaksiPenjualanHasStatusPenjualan = $this->fakeTransaksiPenjualanHasStatusPenjualanData();
        $updatedTransaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepo->update($fakeTransaksiPenjualanHasStatusPenjualan, $transaksiPenjualanHasStatusPenjualan->id);
        $this->assertModelData($fakeTransaksiPenjualanHasStatusPenjualan, $updatedTransaksiPenjualanHasStatusPenjualan->toArray());
        $dbTransaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepo->find($transaksiPenjualanHasStatusPenjualan->id);
        $this->assertModelData($fakeTransaksiPenjualanHasStatusPenjualan, $dbTransaksiPenjualanHasStatusPenjualan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransaksiPenjualanHasStatusPenjualan()
    {
        $transaksiPenjualanHasStatusPenjualan = $this->makeTransaksiPenjualanHasStatusPenjualan();
        $resp = $this->transaksiPenjualanHasStatusPenjualanRepo->delete($transaksiPenjualanHasStatusPenjualan->id);
        $this->assertTrue($resp);
        $this->assertNull(TransaksiPenjualanHasStatusPenjualan::find($transaksiPenjualanHasStatusPenjualan->id), 'TransaksiPenjualanHasStatusPenjualan should not exist in DB');
    }
}
