<?php

use Faker\Factory as Faker;
use App\Models\Progres;
use App\Repositories\ProgresRepository;

trait MakeProgresTrait
{
    /**
     * Create fake instance of Progres and save it in database
     *
     * @param array $progresFields
     * @return Progres
     */
    public function makeProgres($progresFields = [])
    {
        /** @var ProgresRepository $progresRepo */
        $progresRepo = App::make(ProgresRepository::class);
        $theme = $this->fakeProgresData($progresFields);
        return $progresRepo->create($theme);
    }

    /**
     * Get fake instance of Progres
     *
     * @param array $progresFields
     * @return Progres
     */
    public function fakeProgres($progresFields = [])
    {
        return new Progres($this->fakeProgresData($progresFields));
    }

    /**
     * Get fake data of Progres
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProgresData($progresFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'foto' => $fake->word,
            'deskripsi' => $fake->word,
            'berat' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'ternak_investasis_id' => $fake->randomDigitNotNull
        ], $progresFields);
    }
}
