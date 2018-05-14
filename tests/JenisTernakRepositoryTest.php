<?php

use App\Models\JenisTernak;
use App\Repositories\JenisTernakRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisTernakRepositoryTest extends TestCase
{
    use MakeJenisTernakTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JenisTernakRepository
     */
    protected $jenisTernakRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jenisTernakRepo = App::make(JenisTernakRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJenisTernak()
    {
        $jenisTernak = $this->fakeJenisTernakData();
        $createdJenisTernak = $this->jenisTernakRepo->create($jenisTernak);
        $createdJenisTernak = $createdJenisTernak->toArray();
        $this->assertArrayHasKey('id', $createdJenisTernak);
        $this->assertNotNull($createdJenisTernak['id'], 'Created JenisTernak must have id specified');
        $this->assertNotNull(JenisTernak::find($createdJenisTernak['id']), 'JenisTernak with given id must be in DB');
        $this->assertModelData($jenisTernak, $createdJenisTernak);
    }

    /**
     * @test read
     */
    public function testReadJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $dbJenisTernak = $this->jenisTernakRepo->find($jenisTernak->id);
        $dbJenisTernak = $dbJenisTernak->toArray();
        $this->assertModelData($jenisTernak->toArray(), $dbJenisTernak);
    }

    /**
     * @test update
     */
    public function testUpdateJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $fakeJenisTernak = $this->fakeJenisTernakData();
        $updatedJenisTernak = $this->jenisTernakRepo->update($fakeJenisTernak, $jenisTernak->id);
        $this->assertModelData($fakeJenisTernak, $updatedJenisTernak->toArray());
        $dbJenisTernak = $this->jenisTernakRepo->find($jenisTernak->id);
        $this->assertModelData($fakeJenisTernak, $dbJenisTernak->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $resp = $this->jenisTernakRepo->delete($jenisTernak->id);
        $this->assertTrue($resp);
        $this->assertNull(JenisTernak::find($jenisTernak->id), 'JenisTernak should not exist in DB');
    }
}
