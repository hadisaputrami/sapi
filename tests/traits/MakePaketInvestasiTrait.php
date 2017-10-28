<?php

use Faker\Factory as Faker;
use App\Models\PaketInvestasi;
use App\Repositories\PaketInvestasiRepository;

trait MakePaketInvestasiTrait
{
    /**
     * Create fake instance of PaketInvestasi and save it in database
     *
     * @param array $paketInvestasiFields
     * @return PaketInvestasi
     */
    public function makePaketInvestasi($paketInvestasiFields = [])
    {
        /** @var PaketInvestasiRepository $paketInvestasiRepo */
        $paketInvestasiRepo = App::make(PaketInvestasiRepository::class);
        $theme = $this->fakePaketInvestasiData($paketInvestasiFields);
        return $paketInvestasiRepo->create($theme);
    }

    /**
     * Get fake instance of PaketInvestasi
     *
     * @param array $paketInvestasiFields
     * @return PaketInvestasi
     */
    public function fakePaketInvestasi($paketInvestasiFields = [])
    {
        return new PaketInvestasi($this->fakePaketInvestasiData($paketInvestasiFields));
    }

    /**
     * Get fake data of PaketInvestasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaketInvestasiData($paketInvestasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'nama' => $fake->word,
            'harga' => $fake->word,
            'massa' => $fake->word,
            'lama_kontrak' => $fake->word,
            'deskripsi' => $fake->word
        ], $paketInvestasiFields);
    }
}
