<?php

use App\Models\InvestorHasTransaksiInvestasi;
use App\Repositories\InvestorHasTransaksiInvestasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestorHasTransaksiInvestasiRepositoryTest extends TestCase
{
    use MakeInvestorHasTransaksiInvestasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InvestorHasTransaksiInvestasiRepository
     */
    protected $investorHasTransaksiInvestasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->investorHasTransaksiInvestasiRepo = App::make(InvestorHasTransaksiInvestasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->fakeInvestorHasTransaksiInvestasiData();
        $createdInvestorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepo->create($investorHasTransaksiInvestasi);
        $createdInvestorHasTransaksiInvestasi = $createdInvestorHasTransaksiInvestasi->toArray();
        $this->assertArrayHasKey('id', $createdInvestorHasTransaksiInvestasi);
        $this->assertNotNull($createdInvestorHasTransaksiInvestasi['id'], 'Created InvestorHasTransaksiInvestasi must have id specified');
        $this->assertNotNull(InvestorHasTransaksiInvestasi::find($createdInvestorHasTransaksiInvestasi['id']), 'InvestorHasTransaksiInvestasi with given id must be in DB');
        $this->assertModelData($investorHasTransaksiInvestasi, $createdInvestorHasTransaksiInvestasi);
    }

    /**
     * @test read
     */
    public function testReadInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $dbInvestorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepo->find($investorHasTransaksiInvestasi->id);
        $dbInvestorHasTransaksiInvestasi = $dbInvestorHasTransaksiInvestasi->toArray();
        $this->assertModelData($investorHasTransaksiInvestasi->toArray(), $dbInvestorHasTransaksiInvestasi);
    }

    /**
     * @test update
     */
    public function testUpdateInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $fakeInvestorHasTransaksiInvestasi = $this->fakeInvestorHasTransaksiInvestasiData();
        $updatedInvestorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepo->update($fakeInvestorHasTransaksiInvestasi, $investorHasTransaksiInvestasi->id);
        $this->assertModelData($fakeInvestorHasTransaksiInvestasi, $updatedInvestorHasTransaksiInvestasi->toArray());
        $dbInvestorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepo->find($investorHasTransaksiInvestasi->id);
        $this->assertModelData($fakeInvestorHasTransaksiInvestasi, $dbInvestorHasTransaksiInvestasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInvestorHasTransaksiInvestasi()
    {
        $investorHasTransaksiInvestasi = $this->makeInvestorHasTransaksiInvestasi();
        $resp = $this->investorHasTransaksiInvestasiRepo->delete($investorHasTransaksiInvestasi->id);
        $this->assertTrue($resp);
        $this->assertNull(InvestorHasTransaksiInvestasi::find($investorHasTransaksiInvestasi->id), 'InvestorHasTransaksiInvestasi should not exist in DB');
    }
}
