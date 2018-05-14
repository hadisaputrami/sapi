<?php

use App\Models\Asuransi;
use App\Repositories\AsuransiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AsuransiRepositoryTest extends TestCase
{
    use MakeAsuransiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AsuransiRepository
     */
    protected $asuransiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->asuransiRepo = App::make(AsuransiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAsuransi()
    {
        $asuransi = $this->fakeAsuransiData();
        $createdAsuransi = $this->asuransiRepo->create($asuransi);
        $createdAsuransi = $createdAsuransi->toArray();
        $this->assertArrayHasKey('id', $createdAsuransi);
        $this->assertNotNull($createdAsuransi['id'], 'Created Asuransi must have id specified');
        $this->assertNotNull(Asuransi::find($createdAsuransi['id']), 'Asuransi with given id must be in DB');
        $this->assertModelData($asuransi, $createdAsuransi);
    }

    /**
     * @test read
     */
    public function testReadAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $dbAsuransi = $this->asuransiRepo->find($asuransi->id);
        $dbAsuransi = $dbAsuransi->toArray();
        $this->assertModelData($asuransi->toArray(), $dbAsuransi);
    }

    /**
     * @test update
     */
    public function testUpdateAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $fakeAsuransi = $this->fakeAsuransiData();
        $updatedAsuransi = $this->asuransiRepo->update($fakeAsuransi, $asuransi->id);
        $this->assertModelData($fakeAsuransi, $updatedAsuransi->toArray());
        $dbAsuransi = $this->asuransiRepo->find($asuransi->id);
        $this->assertModelData($fakeAsuransi, $dbAsuransi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAsuransi()
    {
        $asuransi = $this->makeAsuransi();
        $resp = $this->asuransiRepo->delete($asuransi->id);
        $this->assertTrue($resp);
        $this->assertNull(Asuransi::find($asuransi->id), 'Asuransi should not exist in DB');
    }
}
