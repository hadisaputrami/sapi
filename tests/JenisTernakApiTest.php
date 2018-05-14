<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisTernakApiTest extends TestCase
{
    use MakeJenisTernakTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJenisTernak()
    {
        $jenisTernak = $this->fakeJenisTernakData();
        $this->json('POST', '/api/v1/jenisTernaks', $jenisTernak);

        $this->assertApiResponse($jenisTernak);
    }

    /**
     * @test
     */
    public function testReadJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $this->json('GET', '/api/v1/jenisTernaks/'.$jenisTernak->id);

        $this->assertApiResponse($jenisTernak->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $editedJenisTernak = $this->fakeJenisTernakData();

        $this->json('PUT', '/api/v1/jenisTernaks/'.$jenisTernak->id, $editedJenisTernak);

        $this->assertApiResponse($editedJenisTernak);
    }

    /**
     * @test
     */
    public function testDeleteJenisTernak()
    {
        $jenisTernak = $this->makeJenisTernak();
        $this->json('DELETE', '/api/v1/jenisTernaks/'.$jenisTernak->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jenisTernaks/'.$jenisTernak->id);

        $this->assertResponseStatus(404);
    }
}
