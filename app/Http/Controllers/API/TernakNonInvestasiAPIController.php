<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTernakNonInvestasiAPIRequest;
use App\Http\Requests\API\UpdateTernakNonInvestasiAPIRequest;
use App\Models\TernakNonInvestasi;
use App\Repositories\TernakNonInvestasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TernakNonInvestasiController
 * @package App\Http\Controllers\API
 */

class TernakNonInvestasiAPIController extends AppBaseController
{
    /** @var  TernakNonInvestasiRepository */
    private $ternakNonInvestasiRepository;

    public function __construct(TernakNonInvestasiRepository $ternakNonInvestasiRepo)
    {
        $this->ternakNonInvestasiRepository = $ternakNonInvestasiRepo;
    }

    /**
     * Display a listing of the TernakNonInvestasi.
     * GET|HEAD /ternakNonInvestasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ternakNonInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $this->ternakNonInvestasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ternakNonInvestasis = $this->ternakNonInvestasiRepository->all();

        return $this->sendResponse($ternakNonInvestasis->toArray(), 'Ternak Non Investasis retrieved successfully');
    }

    /**
     * Store a newly created TernakNonInvestasi in storage.
     * POST /ternakNonInvestasis
     *
     * @param CreateTernakNonInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakNonInvestasiAPIRequest $request)
    {
        $input = $request->all();

        $ternakNonInvestasis = $this->ternakNonInvestasiRepository->create($input);

        return $this->sendResponse($ternakNonInvestasis->toArray(), 'Ternak Non Investasi saved successfully');
    }

    /**
     * Display the specified TernakNonInvestasi.
     * GET|HEAD /ternakNonInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TernakNonInvestasi $ternakNonInvestasi */
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            return $this->sendError('Ternak Non Investasi not found');
        }

        return $this->sendResponse($ternakNonInvestasi->toArray(), 'Ternak Non Investasi retrieved successfully');
    }

    /**
     * Update the specified TernakNonInvestasi in storage.
     * PUT/PATCH /ternakNonInvestasis/{id}
     *
     * @param  int $id
     * @param UpdateTernakNonInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakNonInvestasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var TernakNonInvestasi $ternakNonInvestasi */
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            return $this->sendError('Ternak Non Investasi not found');
        }

        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->update($input, $id);

        return $this->sendResponse($ternakNonInvestasi->toArray(), 'TernakNonInvestasi updated successfully');
    }

    /**
     * Remove the specified TernakNonInvestasi from storage.
     * DELETE /ternakNonInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TernakNonInvestasi $ternakNonInvestasi */
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            return $this->sendError('Ternak Non Investasi not found');
        }

        $ternakNonInvestasi->delete();

        return $this->sendResponse($id, 'Ternak Non Investasi deleted successfully');
    }
}
