<?php

use Faker\Factory as Faker;
use App\Models\TernakInvestasi;
use App\Repositories\TernakInvestasiRepository;

trait MakeTernakInvestasiTrait
{
    /**
     * Create fake instance of TernakInvestasi and save it in database
     *
     * @param array $ternakInvestasiFields
     * @return TernakInvestasi
     */
    public function makeTernakInvestasi($ternakInvestasiFields = [])
    {
        /** @var TernakInvestasiRepository $ternakInvestasiRepo */
        $ternakInvestasiRepo = App::make(TernakInvestasiRepository::class);
        $theme = $this->fakeTernakInvestasiData($ternakInvestasiFields);
        return $ternakInvestasiRepo->create($theme);
    }

    /**
     * Get fake instance of TernakInvestasi
     *
     * @param array $ternakInvestasiFields
     * @return TernakInvestasi
     */
    public function fakeTernakInvestasi($ternakInvestasiFields = [])
    {
        return new TernakInvestasi($this->fakeTernakInvestasiData($ternakInvestasiFields));
    }

    /**
     * Get fake data of TernakInvestasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTernakInvestasiData($ternakInvestasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'ternaks_id' => $fake->randomDigitNotNull,
            'transaksi_investasis_id' => $fake->randomDigitNotNull
        ], $ternakInvestasiFields);
    }
}
