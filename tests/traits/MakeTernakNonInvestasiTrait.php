<?php

use Faker\Factory as Faker;
use App\Models\TernakNonInvestasi;
use App\Repositories\TernakNonInvestasiRepository;

trait MakeTernakNonInvestasiTrait
{
    /**
     * Create fake instance of TernakNonInvestasi and save it in database
     *
     * @param array $ternakNonInvestasiFields
     * @return TernakNonInvestasi
     */
    public function makeTernakNonInvestasi($ternakNonInvestasiFields = [])
    {
        /** @var TernakNonInvestasiRepository $ternakNonInvestasiRepo */
        $ternakNonInvestasiRepo = App::make(TernakNonInvestasiRepository::class);
        $theme = $this->fakeTernakNonInvestasiData($ternakNonInvestasiFields);
        return $ternakNonInvestasiRepo->create($theme);
    }

    /**
     * Get fake instance of TernakNonInvestasi
     *
     * @param array $ternakNonInvestasiFields
     * @return TernakNonInvestasi
     */
    public function fakeTernakNonInvestasi($ternakNonInvestasiFields = [])
    {
        return new TernakNonInvestasi($this->fakeTernakNonInvestasiData($ternakNonInvestasiFields));
    }

    /**
     * Get fake data of TernakNonInvestasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTernakNonInvestasiData($ternakNonInvestasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'massa_awal' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'ternaks_id' => $fake->randomDigitNotNull
        ], $ternakNonInvestasiFields);
    }
}
