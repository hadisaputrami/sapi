<?php

use App\Models\PaketInvestasi;
use App\Repositories\PaketInvestasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaketInvestasiRepositoryTest extends TestCase
{
    use MakePaketInvestasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaketInvestasiRepository
     */
    protected $paketInvestasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paketInvestasiRepo = App::make(PaketInvestasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaketInvestasi()
    {
        $paketInvestasi = $this->fakePaketInvestasiData();
        $createdPaketInvestasi = $this->paketInvestasiRepo->create($paketInvestasi);
        $createdPaketInvestasi = $createdPaketInvestasi->toArray();
        $this->assertArrayHasKey('id', $createdPaketInvestasi);
        $this->assertNotNull($createdPaketInvestasi['id'], 'Created PaketInvestasi must have id specified');
        $this->assertNotNull(PaketInvestasi::find($createdPaketInvestasi['id']), 'PaketInvestasi with given id must be in DB');
        $this->assertModelData($paketInvestasi, $createdPaketInvestasi);
    }

    /**
     * @test read
     */
    public function testReadPaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $dbPaketInvestasi = $this->paketInvestasiRepo->find($paketInvestasi->id);
        $dbPaketInvestasi = $dbPaketInvestasi->toArray();
        $this->assertModelData($paketInvestasi->toArray(), $dbPaketInvestasi);
    }

    /**
     * @test update
     */
    public function testUpdatePaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $fakePaketInvestasi = $this->fakePaketInvestasiData();
        $updatedPaketInvestasi = $this->paketInvestasiRepo->update($fakePaketInvestasi, $paketInvestasi->id);
        $this->assertModelData($fakePaketInvestasi, $updatedPaketInvestasi->toArray());
        $dbPaketInvestasi = $this->paketInvestasiRepo->find($paketInvestasi->id);
        $this->assertModelData($fakePaketInvestasi, $dbPaketInvestasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaketInvestasi()
    {
        $paketInvestasi = $this->makePaketInvestasi();
        $resp = $this->paketInvestasiRepo->delete($paketInvestasi->id);
        $this->assertTrue($resp);
        $this->assertNull(PaketInvestasi::find($paketInvestasi->id), 'PaketInvestasi should not exist in DB');
    }
}
