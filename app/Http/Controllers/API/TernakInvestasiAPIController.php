<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTernakInvestasiAPIRequest;
use App\Http\Requests\API\UpdateTernakInvestasiAPIRequest;
use App\Models\TernakInvestasi;
use App\Repositories\TernakInvestasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TernakInvestasiController
 * @package App\Http\Controllers\API
 */

class TernakInvestasiAPIController extends AppBaseController
{
    /** @var  TernakInvestasiRepository */
    private $ternakInvestasiRepository;

    public function __construct(TernakInvestasiRepository $ternakInvestasiRepo)
    {
        $this->ternakInvestasiRepository = $ternakInvestasiRepo;
    }

    /**
     * Display a listing of the TernakInvestasi.
     * GET|HEAD /ternakInvestasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ternakInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $this->ternakInvestasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ternakInvestasis = $this->ternakInvestasiRepository->all();

        return $this->sendResponse($ternakInvestasis->toArray(), 'Ternak Investasis retrieved successfully');
    }

    /**
     * Store a newly created TernakInvestasi in storage.
     * POST /ternakInvestasis
     *
     * @param CreateTernakInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakInvestasiAPIRequest $request)
    {
        $input = $request->all();

        $ternakInvestasis = $this->ternakInvestasiRepository->create($input);

        return $this->sendResponse($ternakInvestasis->toArray(), 'Ternak Investasi saved successfully');
    }

    /**
     * Display the specified TernakInvestasi.
     * GET|HEAD /ternakInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TernakInvestasi $ternakInvestasi */
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            return $this->sendError('Ternak Investasi not found');
        }

        return $this->sendResponse($ternakInvestasi->toArray(), 'Ternak Investasi retrieved successfully');
    }

    /**
     * Update the specified TernakInvestasi in storage.
     * PUT/PATCH /ternakInvestasis/{id}
     *
     * @param  int $id
     * @param UpdateTernakInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakInvestasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var TernakInvestasi $ternakInvestasi */
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            return $this->sendError('Ternak Investasi not found');
        }

        $ternakInvestasi = $this->ternakInvestasiRepository->update($input, $id);

        return $this->sendResponse($ternakInvestasi->toArray(), 'TernakInvestasi updated successfully');
    }

    /**
     * Remove the specified TernakInvestasi from storage.
     * DELETE /ternakInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TernakInvestasi $ternakInvestasi */
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            return $this->sendError('Ternak Investasi not found');
        }

        $ternakInvestasi->delete();

        return $this->sendResponse($id, 'Ternak Investasi deleted successfully');
    }
}
