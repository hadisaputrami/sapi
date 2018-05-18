<?php

use Faker\Factory as Faker;
use App\Models\StatusKonfirmasi;
use App\Repositories\StatusKonfirmasiRepository;

trait MakeStatusKonfirmasiTrait
{
    /**
     * Create fake instance of StatusKonfirmasi and save it in database
     *
     * @param array $statusKonfirmasiFields
     * @return StatusKonfirmasi
     */
    public function makeStatusKonfirmasi($statusKonfirmasiFields = [])
    {
        /** @var StatusKonfirmasiRepository $statusKonfirmasiRepo */
        $statusKonfirmasiRepo = App::make(StatusKonfirmasiRepository::class);
        $theme = $this->fakeStatusKonfirmasiData($statusKonfirmasiFields);
        return $statusKonfirmasiRepo->create($theme);
    }

    /**
     * Get fake instance of StatusKonfirmasi
     *
     * @param array $statusKonfirmasiFields
     * @return StatusKonfirmasi
     */
    public function fakeStatusKonfirmasi($statusKonfirmasiFields = [])
    {
        return new StatusKonfirmasi($this->fakeStatusKonfirmasiData($statusKonfirmasiFields));
    }

    /**
     * Get fake data of StatusKonfirmasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusKonfirmasiData($statusKonfirmasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $statusKonfirmasiFields);
    }
}
