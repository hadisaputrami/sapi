<?php

use App\Models\Progres;
use App\Repositories\ProgresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgresRepositoryTest extends TestCase
{
    use MakeProgresTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProgresRepository
     */
    protected $progresRepo;

    public function setUp()
    {
        parent::setUp();
        $this->progresRepo = App::make(ProgresRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProgres()
    {
        $progres = $this->fakeProgresData();
        $createdProgres = $this->progresRepo->create($progres);
        $createdProgres = $createdProgres->toArray();
        $this->assertArrayHasKey('id', $createdProgres);
        $this->assertNotNull($createdProgres['id'], 'Created Progres must have id specified');
        $this->assertNotNull(Progres::find($createdProgres['id']), 'Progres with given id must be in DB');
        $this->assertModelData($progres, $createdProgres);
    }

    /**
     * @test read
     */
    public function testReadProgres()
    {
        $progres = $this->makeProgres();
        $dbProgres = $this->progresRepo->find($progres->id);
        $dbProgres = $dbProgres->toArray();
        $this->assertModelData($progres->toArray(), $dbProgres);
    }

    /**
     * @test update
     */
    public function testUpdateProgres()
    {
        $progres = $this->makeProgres();
        $fakeProgres = $this->fakeProgresData();
        $updatedProgres = $this->progresRepo->update($fakeProgres, $progres->id);
        $this->assertModelData($fakeProgres, $updatedProgres->toArray());
        $dbProgres = $this->progresRepo->find($progres->id);
        $this->assertModelData($fakeProgres, $dbProgres->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProgres()
    {
        $progres = $this->makeProgres();
        $resp = $this->progresRepo->delete($progres->id);
        $this->assertTrue($resp);
        $this->assertNull(Progres::find($progres->id), 'Progres should not exist in DB');
    }
}
