<?php

use Faker\Factory as Faker;
use App\Models\Ternak;
use App\Repositories\TernakRepository;

trait MakeTernakTrait
{
    /**
     * Create fake instance of Ternak and save it in database
     *
     * @param array $ternakFields
     * @return Ternak
     */
    public function makeTernak($ternakFields = [])
    {
        /** @var TernakRepository $ternakRepo */
        $ternakRepo = App::make(TernakRepository::class);
        $theme = $this->fakeTernakData($ternakFields);
        return $ternakRepo->create($theme);
    }

    /**
     * Get fake instance of Ternak
     *
     * @param array $ternakFields
     * @return Ternak
     */
    public function fakeTernak($ternakFields = [])
    {
        return new Ternak($this->fakeTernakData($ternakFields));
    }

    /**
     * Get fake data of Ternak
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTernakData($ternakFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'dob' => $fake->word,
            'tanggal_masuk' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'peternaks_id' => $fake->randomDigitNotNull,
            'jenis_ternaks_id' => $fake->randomDigitNotNull
        ], $ternakFields);
    }
}
