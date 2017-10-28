<?php

use App\Models\Ternak;
use App\Repositories\TernakRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TernakRepositoryTest extends TestCase
{
    use MakeTernakTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TernakRepository
     */
    protected $ternakRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ternakRepo = App::make(TernakRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTernak()
    {
        $ternak = $this->fakeTernakData();
        $createdTernak = $this->ternakRepo->create($ternak);
        $createdTernak = $createdTernak->toArray();
        $this->assertArrayHasKey('id', $createdTernak);
        $this->assertNotNull($createdTernak['id'], 'Created Ternak must have id specified');
        $this->assertNotNull(Ternak::find($createdTernak['id']), 'Ternak with given id must be in DB');
        $this->assertModelData($ternak, $createdTernak);
    }

    /**
     * @test read
     */
    public function testReadTernak()
    {
        $ternak = $this->makeTernak();
        $dbTernak = $this->ternakRepo->find($ternak->id);
        $dbTernak = $dbTernak->toArray();
        $this->assertModelData($ternak->toArray(), $dbTernak);
    }

    /**
     * @test update
     */
    public function testUpdateTernak()
    {
        $ternak = $this->makeTernak();
        $fakeTernak = $this->fakeTernakData();
        $updatedTernak = $this->ternakRepo->update($fakeTernak, $ternak->id);
        $this->assertModelData($fakeTernak, $updatedTernak->toArray());
        $dbTernak = $this->ternakRepo->find($ternak->id);
        $this->assertModelData($fakeTernak, $dbTernak->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTernak()
    {
        $ternak = $this->makeTernak();
        $resp = $this->ternakRepo->delete($ternak->id);
        $this->assertTrue($resp);
        $this->assertNull(Ternak::find($ternak->id), 'Ternak should not exist in DB');
    }
}
