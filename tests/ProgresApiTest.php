<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgresApiTest extends TestCase
{
    use MakeProgresTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProgres()
    {
        $progres = $this->fakeProgresData();
        $this->json('POST', '/api/v1/progres', $progres);

        $this->assertApiResponse($progres);
    }

    /**
     * @test
     */
    public function testReadProgres()
    {
        $progres = $this->makeProgres();
        $this->json('GET', '/api/v1/progres/'.$progres->id);

        $this->assertApiResponse($progres->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProgres()
    {
        $progres = $this->makeProgres();
        $editedProgres = $this->fakeProgresData();

        $this->json('PUT', '/api/v1/progres/'.$progres->id, $editedProgres);

        $this->assertApiResponse($editedProgres);
    }

    /**
     * @test
     */
    public function testDeleteProgres()
    {
        $progres = $this->makeProgres();
        $this->json('DELETE', '/api/v1/progres/'.$progres->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/progres/'.$progres->id);

        $this->assertResponseStatus(404);
    }
}
