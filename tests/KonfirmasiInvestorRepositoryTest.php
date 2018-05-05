<?php

use App\Models\KonfirmasiInvestor;
use App\Repositories\KonfirmasiInvestorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KonfirmasiInvestorRepositoryTest extends TestCase
{
    use MakeKonfirmasiInvestorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KonfirmasiInvestorRepository
     */
    protected $konfirmasiInvestorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->konfirmasiInvestorRepo = App::make(KonfirmasiInvestorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->fakeKonfirmasiInvestorData();
        $createdKonfirmasiInvestor = $this->konfirmasiInvestorRepo->create($konfirmasiInvestor);
        $createdKonfirmasiInvestor = $createdKonfirmasiInvestor->toArray();
        $this->assertArrayHasKey('id', $createdKonfirmasiInvestor);
        $this->assertNotNull($createdKonfirmasiInvestor['id'], 'Created KonfirmasiInvestor must have id specified');
        $this->assertNotNull(KonfirmasiInvestor::find($createdKonfirmasiInvestor['id']), 'KonfirmasiInvestor with given id must be in DB');
        $this->assertModelData($konfirmasiInvestor, $createdKonfirmasiInvestor);
    }

    /**
     * @test read
     */
    public function testReadKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $dbKonfirmasiInvestor = $this->konfirmasiInvestorRepo->find($konfirmasiInvestor->id);
        $dbKonfirmasiInvestor = $dbKonfirmasiInvestor->toArray();
        $this->assertModelData($konfirmasiInvestor->toArray(), $dbKonfirmasiInvestor);
    }

    /**
     * @test update
     */
    public function testUpdateKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $fakeKonfirmasiInvestor = $this->fakeKonfirmasiInvestorData();
        $updatedKonfirmasiInvestor = $this->konfirmasiInvestorRepo->update($fakeKonfirmasiInvestor, $konfirmasiInvestor->id);
        $this->assertModelData($fakeKonfirmasiInvestor, $updatedKonfirmasiInvestor->toArray());
        $dbKonfirmasiInvestor = $this->konfirmasiInvestorRepo->find($konfirmasiInvestor->id);
        $this->assertModelData($fakeKonfirmasiInvestor, $dbKonfirmasiInvestor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKonfirmasiInvestor()
    {
        $konfirmasiInvestor = $this->makeKonfirmasiInvestor();
        $resp = $this->konfirmasiInvestorRepo->delete($konfirmasiInvestor->id);
        $this->assertTrue($resp);
        $this->assertNull(KonfirmasiInvestor::find($konfirmasiInvestor->id), 'KonfirmasiInvestor should not exist in DB');
    }
}
