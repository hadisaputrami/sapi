<?php

use App\Models\TransaksiInvestasi;
use App\Repositories\TransaksiInvestasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiInvestasiRepositoryTest extends TestCase
{
    use MakeTransaksiInvestasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransaksiInvestasiRepository
     */
    protected $transaksiInvestasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transaksiInvestasiRepo = App::make(TransaksiInvestasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->fakeTransaksiInvestasiData();
        $createdTransaksiInvestasi = $this->transaksiInvestasiRepo->create($transaksiInvestasi);
        $createdTransaksiInvestasi = $createdTransaksiInvestasi->toArray();
        $this->assertArrayHasKey('id', $createdTransaksiInvestasi);
        $this->assertNotNull($createdTransaksiInvestasi['id'], 'Created TransaksiInvestasi must have id specified');
        $this->assertNotNull(TransaksiInvestasi::find($createdTransaksiInvestasi['id']), 'TransaksiInvestasi with given id must be in DB');
        $this->assertModelData($transaksiInvestasi, $createdTransaksiInvestasi);
    }

    /**
     * @test read
     */
    public function testReadTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $dbTransaksiInvestasi = $this->transaksiInvestasiRepo->find($transaksiInvestasi->id);
        $dbTransaksiInvestasi = $dbTransaksiInvestasi->toArray();
        $this->assertModelData($transaksiInvestasi->toArray(), $dbTransaksiInvestasi);
    }

    /**
     * @test update
     */
    public function testUpdateTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $fakeTransaksiInvestasi = $this->fakeTransaksiInvestasiData();
        $updatedTransaksiInvestasi = $this->transaksiInvestasiRepo->update($fakeTransaksiInvestasi, $transaksiInvestasi->id);
        $this->assertModelData($fakeTransaksiInvestasi, $updatedTransaksiInvestasi->toArray());
        $dbTransaksiInvestasi = $this->transaksiInvestasiRepo->find($transaksiInvestasi->id);
        $this->assertModelData($fakeTransaksiInvestasi, $dbTransaksiInvestasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransaksiInvestasi()
    {
        $transaksiInvestasi = $this->makeTransaksiInvestasi();
        $resp = $this->transaksiInvestasiRepo->delete($transaksiInvestasi->id);
        $this->assertTrue($resp);
        $this->assertNull(TransaksiInvestasi::find($transaksiInvestasi->id), 'TransaksiInvestasi should not exist in DB');
    }
}
