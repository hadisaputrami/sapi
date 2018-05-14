<?php

use Faker\Factory as Faker;
use App\Models\Asuransi;
use App\Repositories\AsuransiRepository;

trait MakeAsuransiTrait
{
    /**
     * Create fake instance of Asuransi and save it in database
     *
     * @param array $asuransiFields
     * @return Asuransi
     */
    public function makeAsuransi($asuransiFields = [])
    {
        /** @var AsuransiRepository $asuransiRepo */
        $asuransiRepo = App::make(AsuransiRepository::class);
        $theme = $this->fakeAsuransiData($asuransiFields);
        return $asuransiRepo->create($theme);
    }

    /**
     * Get fake instance of Asuransi
     *
     * @param array $asuransiFields
     * @return Asuransi
     */
    public function fakeAsuransi($asuransiFields = [])
    {
        return new Asuransi($this->fakeAsuransiData($asuransiFields));
    }

    /**
     * Get fake data of Asuransi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAsuransiData($asuransiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'premi' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'nomor_polis' => $fake->word,
            'nama_penjamin' => $fake->word
        ], $asuransiFields);
    }
}
