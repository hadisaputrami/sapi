<?php

use Faker\Factory as Faker;
use App\Models\TransaksiInvestasi;
use App\Repositories\TransaksiInvestasiRepository;

trait MakeTransaksiInvestasiTrait
{
    /**
     * Create fake instance of TransaksiInvestasi and save it in database
     *
     * @param array $transaksiInvestasiFields
     * @return TransaksiInvestasi
     */
    public function makeTransaksiInvestasi($transaksiInvestasiFields = [])
    {
        /** @var TransaksiInvestasiRepository $transaksiInvestasiRepo */
        $transaksiInvestasiRepo = App::make(TransaksiInvestasiRepository::class);
        $theme = $this->fakeTransaksiInvestasiData($transaksiInvestasiFields);
        return $transaksiInvestasiRepo->create($theme);
    }

    /**
     * Get fake instance of TransaksiInvestasi
     *
     * @param array $transaksiInvestasiFields
     * @return TransaksiInvestasi
     */
    public function fakeTransaksiInvestasi($transaksiInvestasiFields = [])
    {
        return new TransaksiInvestasi($this->fakeTransaksiInvestasiData($transaksiInvestasiFields));
    }

    /**
     * Get fake data of TransaksiInvestasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransaksiInvestasiData($transaksiInvestasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode_transaksi' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'paket_investasis_id' => $fake->randomDigitNotNull,
            'ternak_investasis_id' => $fake->randomDigitNotNull,
            'asuransis_id' => $fake->randomDigitNotNull
        ], $transaksiInvestasiFields);
    }
}
