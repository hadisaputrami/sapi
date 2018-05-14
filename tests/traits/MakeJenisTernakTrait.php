<?php

use Faker\Factory as Faker;
use App\Models\JenisTernak;
use App\Repositories\JenisTernakRepository;

trait MakeJenisTernakTrait
{
    /**
     * Create fake instance of JenisTernak and save it in database
     *
     * @param array $jenisTernakFields
     * @return JenisTernak
     */
    public function makeJenisTernak($jenisTernakFields = [])
    {
        /** @var JenisTernakRepository $jenisTernakRepo */
        $jenisTernakRepo = App::make(JenisTernakRepository::class);
        $theme = $this->fakeJenisTernakData($jenisTernakFields);
        return $jenisTernakRepo->create($theme);
    }

    /**
     * Get fake instance of JenisTernak
     *
     * @param array $jenisTernakFields
     * @return JenisTernak
     */
    public function fakeJenisTernak($jenisTernakFields = [])
    {
        return new JenisTernak($this->fakeJenisTernakData($jenisTernakFields));
    }

    /**
     * Get fake data of JenisTernak
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJenisTernakData($jenisTernakFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jenis_ternak' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $jenisTernakFields);
    }
}
