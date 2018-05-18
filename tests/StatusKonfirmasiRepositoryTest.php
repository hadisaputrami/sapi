<?php

use App\Models\StatusKonfirmasi;
use App\Repositories\StatusKonfirmasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusKonfirmasiRepositoryTest extends TestCase
{
    use MakeStatusKonfirmasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusKonfirmasiRepository
     */
    protected $statusKonfirmasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusKonfirmasiRepo = App::make(StatusKonfirmasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->fakeStatusKonfirmasiData();
        $createdStatusKonfirmasi = $this->statusKonfirmasiRepo->create($statusKonfirmasi);
        $createdStatusKonfirmasi = $createdStatusKonfirmasi->toArray();
        $this->assertArrayHasKey('id', $createdStatusKonfirmasi);
        $this->assertNotNull($createdStatusKonfirmasi['id'], 'Created StatusKonfirmasi must have id specified');
        $this->assertNotNull(StatusKonfirmasi::find($createdStatusKonfirmasi['id']), 'StatusKonfirmasi with given id must be in DB');
        $this->assertModelData($statusKonfirmasi, $createdStatusKonfirmasi);
    }

    /**
     * @test read
     */
    public function testReadStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $dbStatusKonfirmasi = $this->statusKonfirmasiRepo->find($statusKonfirmasi->id);
        $dbStatusKonfirmasi = $dbStatusKonfirmasi->toArray();
        $this->assertModelData($statusKonfirmasi->toArray(), $dbStatusKonfirmasi);
    }

    /**
     * @test update
     */
    public function testUpdateStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $fakeStatusKonfirmasi = $this->fakeStatusKonfirmasiData();
        $updatedStatusKonfirmasi = $this->statusKonfirmasiRepo->update($fakeStatusKonfirmasi, $statusKonfirmasi->id);
        $this->assertModelData($fakeStatusKonfirmasi, $updatedStatusKonfirmasi->toArray());
        $dbStatusKonfirmasi = $this->statusKonfirmasiRepo->find($statusKonfirmasi->id);
        $this->assertModelData($fakeStatusKonfirmasi, $dbStatusKonfirmasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $resp = $this->statusKonfirmasiRepo->delete($statusKonfirmasi->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusKonfirmasi::find($statusKonfirmasi->id), 'StatusKonfirmasi should not exist in DB');
    }
}
