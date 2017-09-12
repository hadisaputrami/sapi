<?php

use Faker\Factory as Faker;
use App\Models\Investor;
use App\Repositories\InvestorRepository;

trait MakeInvestorTrait
{
    /**
     * Create fake instance of Investor and save it in database
     *
     * @param array $investorFields
     * @return Investor
     */
    public function makeInvestor($investorFields = [])
    {
        /** @var InvestorRepository $investorRepo */
        $investorRepo = App::make(InvestorRepository::class);
        $theme = $this->fakeInvestorData($investorFields);
        return $investorRepo->create($theme);
    }

    /**
     * Get fake instance of Investor
     *
     * @param array $investorFields
     * @return Investor
     */
    public function fakeInvestor($investorFields = [])
    {
        return new Investor($this->fakeInvestorData($investorFields));
    }

    /**
     * Get fake data of Investor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInvestorData($investorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'update_at' => $fake->date('Y-m-d H:i:s'),
            'nama_pemilik_rek' => $fake->word,
            'nama_bank' => $fake->word,
            'no_rek' => $fake->word,
            'users_id' => $fake->randomDigitNotNull
        ], $investorFields);
    }
}
