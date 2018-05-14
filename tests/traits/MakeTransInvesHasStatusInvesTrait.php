<?php

use Faker\Factory as Faker;
use App\Models\TransInvesHasStatusInves;
use App\Repositories\TransInvesHasStatusInvesRepository;

trait MakeTransInvesHasStatusInvesTrait
{
    /**
     * Create fake instance of TransInvesHasStatusInves and save it in database
     *
     * @param array $transInvesHasStatusInvesFields
     * @return TransInvesHasStatusInves
     */
    public function makeTransInvesHasStatusInves($transInvesHasStatusInvesFields = [])
    {
        /** @var TransInvesHasStatusInvesRepository $transInvesHasStatusInvesRepo */
        $transInvesHasStatusInvesRepo = App::make(TransInvesHasStatusInvesRepository::class);
        $theme = $this->fakeTransInvesHasStatusInvesData($transInvesHasStatusInvesFields);
        return $transInvesHasStatusInvesRepo->create($theme);
    }

    /**
     * Get fake instance of TransInvesHasStatusInves
     *
     * @param array $transInvesHasStatusInvesFields
     * @return TransInvesHasStatusInves
     */
    public function fakeTransInvesHasStatusInves($transInvesHasStatusInvesFields = [])
    {
        return new TransInvesHasStatusInves($this->fakeTransInvesHasStatusInvesData($transInvesHasStatusInvesFields));
    }

    /**
     * Get fake data of TransInvesHasStatusInves
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransInvesHasStatusInvesData($transInvesHasStatusInvesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transaksi_investasis_id' => $fake->randomDigitNotNull,
            'status_transaksi_investasis_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $transInvesHasStatusInvesFields);
    }
}
