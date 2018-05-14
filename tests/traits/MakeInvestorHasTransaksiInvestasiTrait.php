<?php

use Faker\Factory as Faker;
use App\Models\InvestorHasTransaksiInvestasi;
use App\Repositories\InvestorHasTransaksiInvestasiRepository;

trait MakeInvestorHasTransaksiInvestasiTrait
{
    /**
     * Create fake instance of InvestorHasTransaksiInvestasi and save it in database
     *
     * @param array $investorHasTransaksiInvestasiFields
     * @return InvestorHasTransaksiInvestasi
     */
    public function makeInvestorHasTransaksiInvestasi($investorHasTransaksiInvestasiFields = [])
    {
        /** @var InvestorHasTransaksiInvestasiRepository $investorHasTransaksiInvestasiRepo */
        $investorHasTransaksiInvestasiRepo = App::make(InvestorHasTransaksiInvestasiRepository::class);
        $theme = $this->fakeInvestorHasTransaksiInvestasiData($investorHasTransaksiInvestasiFields);
        return $investorHasTransaksiInvestasiRepo->create($theme);
    }

    /**
     * Get fake instance of InvestorHasTransaksiInvestasi
     *
     * @param array $investorHasTransaksiInvestasiFields
     * @return InvestorHasTransaksiInvestasi
     */
    public function fakeInvestorHasTransaksiInvestasi($investorHasTransaksiInvestasiFields = [])
    {
        return new InvestorHasTransaksiInvestasi($this->fakeInvestorHasTransaksiInvestasiData($investorHasTransaksiInvestasiFields));
    }

    /**
     * Get fake data of InvestorHasTransaksiInvestasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInvestorHasTransaksiInvestasiData($investorHasTransaksiInvestasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'investors_id' => $fake->randomDigitNotNull,
            'transaksi_investasis_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'nominal_investasi' => $fake->word,
            'scan_bukti_pembayaran' => $fake->word,
            'jenis_pembayarans_id' => $fake->randomDigitNotNull,
            'jumlah_sapi' => $fake->word
        ], $investorHasTransaksiInvestasiFields);
    }
}
