<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsuransiAPIRequest;
use App\Http\Requests\API\UpdateAsuransiAPIRequest;
use App\Models\Asuransi;
use App\Repositories\AsuransiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AsuransiController
 * @package App\Http\Controllers\API
 */

class AsuransiAPIController extends AppBaseController
{
    /** @var  AsuransiRepository */
    private $asuransiRepository;

    public function __construct(AsuransiRepository $asuransiRepo)
    {
        $this->asuransiRepository = $asuransiRepo;
    }

    /**
     * Display a listing of the Asuransi.
     * GET|HEAD /asuransis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asuransiRepository->pushCriteria(new RequestCriteria($request));
        $this->asuransiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $asuransis = $this->asuransiRepository->all();

        return $this->sendResponse($asuransis->toArray(), 'Asuransis retrieved successfully');
    }

    /**
     * Store a newly created Asuransi in storage.
     * POST /asuransis
     *
     * @param CreateAsuransiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsuransiAPIRequest $request)
    {
        $input = $request->all();

        $asuransis = $this->asuransiRepository->create($input);

        return $this->sendResponse($asuransis->toArray(), 'Asuransi saved successfully');
    }

    /**
     * Display the specified Asuransi.
     * GET|HEAD /asuransis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Asuransi $asuransi */
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            return $this->sendError('Asuransi not found');
        }

        return $this->sendResponse($asuransi->toArray(), 'Asuransi retrieved successfully');
    }

    /**
     * Update the specified Asuransi in storage.
     * PUT/PATCH /asuransis/{id}
     *
     * @param  int $id
     * @param UpdateAsuransiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsuransiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Asuransi $asuransi */
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            return $this->sendError('Asuransi not found');
        }

        $asuransi = $this->asuransiRepository->update($input, $id);

        return $this->sendResponse($asuransi->toArray(), 'Asuransi updated successfully');
    }

    /**
     * Remove the specified Asuransi from storage.
     * DELETE /asuransis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Asuransi $asuransi */
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            return $this->sendError('Asuransi not found');
        }

        $asuransi->delete();

        return $this->sendResponse($id, 'Asuransi deleted successfully');
    }
}
