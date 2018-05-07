<?php

use Faker\Factory as Faker;
use App\Models\KonfirmasiInvestor;
use App\Repositories\KonfirmasiInvestorRepository;

trait MakeKonfirmasiInvestorTrait
{
    /**
     * Create fake instance of KonfirmasiInvestor and save it in database
     *
     * @param array $konfirmasiInvestorFields
     * @return KonfirmasiInvestor
     */
    public function makeKonfirmasiInvestor($konfirmasiInvestorFields = [])
    {
        /** @var KonfirmasiInvestorRepository $konfirmasiInvestorRepo */
        $konfirmasiInvestorRepo = App::make(KonfirmasiInvestorRepository::class);
        $theme = $this->fakeKonfirmasiInvestorData($konfirmasiInvestorFields);
        return $konfirmasiInvestorRepo->create($theme);
    }

    /**
     * Get fake instance of KonfirmasiInvestor
     *
     * @param array $konfirmasiInvestorFields
     * @return KonfirmasiInvestor
     */
    public function fakeKonfirmasiInvestor($konfirmasiInvestorFields = [])
    {
        return new KonfirmasiInvestor($this->fakeKonfirmasiInvestorData($konfirmasiInvestorFields));
    }

    /**
     * Get fake data of KonfirmasiInvestor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKonfirmasiInvestorData($konfirmasiInvestorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'status_konfirmasi' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'investors_id' => $fake->randomDigitNotNull,
            'bank_pengirim' => $fake->word,
            'bank_tujuan' => $fake->word,
            'nominal' => $fake->randomDigitNotNull,
            'nama_pengirim' => $fake->word
        ], $konfirmasiInvestorFields);
    }
}
