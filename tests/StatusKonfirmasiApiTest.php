<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusKonfirmasiApiTest extends TestCase
{
    use MakeStatusKonfirmasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->fakeStatusKonfirmasiData();
        $this->json('POST', '/api/v1/statusKonfirmasis', $statusKonfirmasi);

        $this->assertApiResponse($statusKonfirmasi);
    }

    /**
     * @test
     */
    public function testReadStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $this->json('GET', '/api/v1/statusKonfirmasis/'.$statusKonfirmasi->id);

        $this->assertApiResponse($statusKonfirmasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $editedStatusKonfirmasi = $this->fakeStatusKonfirmasiData();

        $this->json('PUT', '/api/v1/statusKonfirmasis/'.$statusKonfirmasi->id, $editedStatusKonfirmasi);

        $this->assertApiResponse($editedStatusKonfirmasi);
    }

    /**
     * @test
     */
    public function testDeleteStatusKonfirmasi()
    {
        $statusKonfirmasi = $this->makeStatusKonfirmasi();
        $this->json('DELETE', '/api/v1/statusKonfirmasis/'.$statusKonfirmasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusKonfirmasis/'.$statusKonfirmasi->id);

        $this->assertResponseStatus(404);
    }
}
