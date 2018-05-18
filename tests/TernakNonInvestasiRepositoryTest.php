<?php

use App\Models\TernakNonInvestasi;
use App\Repositories\TernakNonInvestasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakNonInvestasiRepositoryTest extends TestCase
{
    use MakeTernakNonInvestasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TernakNonInvestasiRepository
     */
    protected $ternakNonInvestasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ternakNonInvestasiRepo = App::make(TernakNonInvestasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->fakeTernakNonInvestasiData();
        $createdTernakNonInvestasi = $this->ternakNonInvestasiRepo->create($ternakNonInvestasi);
        $createdTernakNonInvestasi = $createdTernakNonInvestasi->toArray();
        $this->assertArrayHasKey('id', $createdTernakNonInvestasi);
        $this->assertNotNull($createdTernakNonInvestasi['id'], 'Created TernakNonInvestasi must have id specified');
        $this->assertNotNull(TernakNonInvestasi::find($createdTernakNonInvestasi['id']), 'TernakNonInvestasi with given id must be in DB');
        $this->assertModelData($ternakNonInvestasi, $createdTernakNonInvestasi);
    }

    /**
     * @test read
     */
    public function testReadTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $dbTernakNonInvestasi = $this->ternakNonInvestasiRepo->find($ternakNonInvestasi->id);
        $dbTernakNonInvestasi = $dbTernakNonInvestasi->toArray();
        $this->assertModelData($ternakNonInvestasi->toArray(), $dbTernakNonInvestasi);
    }

    /**
     * @test update
     */
    public function testUpdateTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $fakeTernakNonInvestasi = $this->fakeTernakNonInvestasiData();
        $updatedTernakNonInvestasi = $this->ternakNonInvestasiRepo->update($fakeTernakNonInvestasi, $ternakNonInvestasi->id);
        $this->assertModelData($fakeTernakNonInvestasi, $updatedTernakNonInvestasi->toArray());
        $dbTernakNonInvestasi = $this->ternakNonInvestasiRepo->find($ternakNonInvestasi->id);
        $this->assertModelData($fakeTernakNonInvestasi, $dbTernakNonInvestasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTernakNonInvestasi()
    {
        $ternakNonInvestasi = $this->makeTernakNonInvestasi();
        $resp = $this->ternakNonInvestasiRepo->delete($ternakNonInvestasi->id);
        $this->assertTrue($resp);
        $this->assertNull(TernakNonInvestasi::find($ternakNonInvestasi->id), 'TernakNonInvestasi should not exist in DB');
    }
}
