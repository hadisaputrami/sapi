<?php

use App\Models\TernakInvestasi;
use App\Repositories\TernakInvestasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakInvestasiRepositoryTest extends TestCase
{
    use MakeTernakInvestasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TernakInvestasiRepository
     */
    protected $ternakInvestasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ternakInvestasiRepo = App::make(TernakInvestasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTernakInvestasi()
    {
        $ternakInvestasi = $this->fakeTernakInvestasiData();
        $createdTernakInvestasi = $this->ternakInvestasiRepo->create($ternakInvestasi);
        $createdTernakInvestasi = $createdTernakInvestasi->toArray();
        $this->assertArrayHasKey('id', $createdTernakInvestasi);
        $this->assertNotNull($createdTernakInvestasi['id'], 'Created TernakInvestasi must have id specified');
        $this->assertNotNull(TernakInvestasi::find($createdTernakInvestasi['id']), 'TernakInvestasi with given id must be in DB');
        $this->assertModelData($ternakInvestasi, $createdTernakInvestasi);
    }

    /**
     * @test read
     */
    public function testReadTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $dbTernakInvestasi = $this->ternakInvestasiRepo->find($ternakInvestasi->id);
        $dbTernakInvestasi = $dbTernakInvestasi->toArray();
        $this->assertModelData($ternakInvestasi->toArray(), $dbTernakInvestasi);
    }

    /**
     * @test update
     */
    public function testUpdateTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $fakeTernakInvestasi = $this->fakeTernakInvestasiData();
        $updatedTernakInvestasi = $this->ternakInvestasiRepo->update($fakeTernakInvestasi, $ternakInvestasi->id);
        $this->assertModelData($fakeTernakInvestasi, $updatedTernakInvestasi->toArray());
        $dbTernakInvestasi = $this->ternakInvestasiRepo->find($ternakInvestasi->id);
        $this->assertModelData($fakeTernakInvestasi, $dbTernakInvestasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTernakInvestasi()
    {
        $ternakInvestasi = $this->makeTernakInvestasi();
        $resp = $this->ternakInvestasiRepo->delete($ternakInvestasi->id);
        $this->assertTrue($resp);
        $this->assertNull(TernakInvestasi::find($ternakInvestasi->id), 'TernakInvestasi should not exist in DB');
    }
}
