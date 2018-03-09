<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTernakAPIRequest;
use App\Http\Requests\API\UpdateTernakAPIRequest;
use App\Models\Ternak;
use App\Repositories\TernakRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TernakController
 * @package App\Http\Controllers\API
 */

class TernakAPIController extends AppBaseController
{
    /** @var  TernakRepository */
    private $ternakRepository;

    public function __construct(TernakRepository $ternakRepo)
    {
        $this->ternakRepository = $ternakRepo;
    }

    /**
     * Display a listing of the Ternak.
     * GET|HEAD /ternaks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ternaks = Ternak::with(['peternak','jenisTernak','ternakInvestasis'=>function($query){
            $query->with(['progresses'=>function($query){
                $query->latest()->limit(1);
            }]);
        },'ternakNonInvestasis'])->get();

        return $this->sendResponse($ternaks->toArray(), 'Ternaks retrieved successfully');
    }

    /**
     * Store a newly created Ternak in storage.
     * POST /ternaks
     *
     * @param CreateTernakAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakAPIRequest $request)
    {
        $input = $request->all();

        $ternaks = $this->ternakRepository->create($input);

        return $this->sendResponse($ternaks->toArray(), 'Ternak saved successfully');
    }

    /**
     * Display the specified Ternak.
     * GET|HEAD /ternaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ternak $ternak */
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            return $this->sendError('Ternak not found');
        }

        return $this->sendResponse($ternak->toArray(), 'Ternak retrieved successfully');
    }

    /**
     * Update the specified Ternak in storage.
     * PUT/PATCH /ternaks/{id}
     *
     * @param  int $id
     * @param UpdateTernakAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ternak $ternak */
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            return $this->sendError('Ternak not found');
        }

        $ternak = $this->ternakRepository->update($input, $id);

        return $this->sendResponse($ternak->toArray(), 'Ternak updated successfully');
    }

    /**
     * Remove the specified Ternak from storage.
     * DELETE /ternaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ternak $ternak */
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            return $this->sendError('Ternak not found');
        }

        $ternak->delete();

        return $this->sendResponse($id, 'Ternak deleted successfully');
    }
}
