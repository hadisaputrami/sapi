<?php

use App\Models\TransInvesHasStatusInves;
use App\Repositories\TransInvesHasStatusInvesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransInvesHasStatusInvesRepositoryTest extends TestCase
{
    use MakeTransInvesHasStatusInvesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransInvesHasStatusInvesRepository
     */
    protected $transInvesHasStatusInvesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transInvesHasStatusInvesRepo = App::make(TransInvesHasStatusInvesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->fakeTransInvesHasStatusInvesData();
        $createdTransInvesHasStatusInves = $this->transInvesHasStatusInvesRepo->create($transInvesHasStatusInves);
        $createdTransInvesHasStatusInves = $createdTransInvesHasStatusInves->toArray();
        $this->assertArrayHasKey('id', $createdTransInvesHasStatusInves);
        $this->assertNotNull($createdTransInvesHasStatusInves['id'], 'Created TransInvesHasStatusInves must have id specified');
        $this->assertNotNull(TransInvesHasStatusInves::find($createdTransInvesHasStatusInves['id']), 'TransInvesHasStatusInves with given id must be in DB');
        $this->assertModelData($transInvesHasStatusInves, $createdTransInvesHasStatusInves);
    }

    /**
     * @test read
     */
    public function testReadTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $dbTransInvesHasStatusInves = $this->transInvesHasStatusInvesRepo->find($transInvesHasStatusInves->id);
        $dbTransInvesHasStatusInves = $dbTransInvesHasStatusInves->toArray();
        $this->assertModelData($transInvesHasStatusInves->toArray(), $dbTransInvesHasStatusInves);
    }

    /**
     * @test update
     */
    public function testUpdateTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $fakeTransInvesHasStatusInves = $this->fakeTransInvesHasStatusInvesData();
        $updatedTransInvesHasStatusInves = $this->transInvesHasStatusInvesRepo->update($fakeTransInvesHasStatusInves, $transInvesHasStatusInves->id);
        $this->assertModelData($fakeTransInvesHasStatusInves, $updatedTransInvesHasStatusInves->toArray());
        $dbTransInvesHasStatusInves = $this->transInvesHasStatusInvesRepo->find($transInvesHasStatusInves->id);
        $this->assertModelData($fakeTransInvesHasStatusInves, $dbTransInvesHasStatusInves->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $resp = $this->transInvesHasStatusInvesRepo->delete($transInvesHasStatusInves->id);
        $this->assertTrue($resp);
        $this->assertNull(TransInvesHasStatusInves::find($transInvesHasStatusInves->id), 'TransInvesHasStatusInves should not exist in DB');
    }
}
