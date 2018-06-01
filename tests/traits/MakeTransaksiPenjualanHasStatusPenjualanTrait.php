<?php

use Faker\Factory as Faker;
use App\Models\TransaksiPenjualanHasStatusPenjualan;
use App\Repositories\TransaksiPenjualanHasStatusPenjualanRepository;

trait MakeTransaksiPenjualanHasStatusPenjualanTrait
{
    /**
     * Create fake instance of TransaksiPenjualanHasStatusPenjualan and save it in database
     *
     * @param array $transaksiPenjualanHasStatusPenjualanFields
     * @return TransaksiPenjualanHasStatusPenjualan
     */
    public function makeTransaksiPenjualanHasStatusPenjualan($transaksiPenjualanHasStatusPenjualanFields = [])
    {
        /** @var TransaksiPenjualanHasStatusPenjualanRepository $transaksiPenjualanHasStatusPenjualanRepo */
        $transaksiPenjualanHasStatusPenjualanRepo = App::make(TransaksiPenjualanHasStatusPenjualanRepository::class);
        $theme = $this->fakeTransaksiPenjualanHasStatusPenjualanData($transaksiPenjualanHasStatusPenjualanFields);
        return $transaksiPenjualanHasStatusPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of TransaksiPenjualanHasStatusPenjualan
     *
     * @param array $transaksiPenjualanHasStatusPenjualanFields
     * @return TransaksiPenjualanHasStatusPenjualan
     */
    public function fakeTransaksiPenjualanHasStatusPenjualan($transaksiPenjualanHasStatusPenjualanFields = [])
    {
        return new TransaksiPenjualanHasStatusPenjualan($this->fakeTransaksiPenjualanHasStatusPenjualanData($transaksiPenjualanHasStatusPenjualanFields));
    }

    /**
     * Get fake data of TransaksiPenjualanHasStatusPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransaksiPenjualanHasStatusPenjualanData($transaksiPenjualanHasStatusPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_penjualans_id' => $fake->randomDigitNotNull,
            'status_penjualans_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'jenis_pembayarans_id' => $fake->randomDigitNotNull,
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s')
        ], $transaksiPenjualanHasStatusPenjualanFields);
    }
}
