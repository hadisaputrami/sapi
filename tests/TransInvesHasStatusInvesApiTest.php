<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransInvesHasStatusInvesApiTest extends TestCase
{
    use MakeTransInvesHasStatusInvesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->fakeTransInvesHasStatusInvesData();
        $this->json('POST', '/api/v1/transInvesHasStatusInves', $transInvesHasStatusInves);

        $this->assertApiResponse($transInvesHasStatusInves);
    }

    /**
     * @test
     */
    public function testReadTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $this->json('GET', '/api/v1/transInvesHasStatusInves/'.$transInvesHasStatusInves->id);

        $this->assertApiResponse($transInvesHasStatusInves->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $editedTransInvesHasStatusInves = $this->fakeTransInvesHasStatusInvesData();

        $this->json('PUT', '/api/v1/transInvesHasStatusInves/'.$transInvesHasStatusInves->id, $editedTransInvesHasStatusInves);

        $this->assertApiResponse($editedTransInvesHasStatusInves);
    }

    /**
     * @test
     */
    public function testDeleteTransInvesHasStatusInves()
    {
        $transInvesHasStatusInves = $this->makeTransInvesHasStatusInves();
        $this->json('DELETE', '/api/v1/transInvesHasStatusInves/'.$transInvesHasStatusInves->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transInvesHasStatusInves/'.$transInvesHasStatusInves->id);

        $this->assertResponseStatus(404);
    }
}
