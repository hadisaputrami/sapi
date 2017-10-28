<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaketInvestasiAPIRequest;
use App\Http\Requests\API\UpdatePaketInvestasiAPIRequest;
use App\Models\PaketInvestasi;
use App\Repositories\PaketInvestasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaketInvestasiController
 * @package App\Http\Controllers\API
 */

class PaketInvestasiAPIController extends AppBaseController
{
    /** @var  PaketInvestasiRepository */
    private $paketInvestasiRepository;

    public function __construct(PaketInvestasiRepository $paketInvestasiRepo)
    {
        $this->paketInvestasiRepository = $paketInvestasiRepo;
    }

    /**
     * Display a listing of the PaketInvestasi.
     * GET|HEAD /paketInvestasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paketInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $this->paketInvestasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paketInvestasis = $this->paketInvestasiRepository->all();

        return $this->sendResponse($paketInvestasis->toArray(), 'Paket Investasis retrieved successfully');
    }

    /**
     * Store a newly created PaketInvestasi in storage.
     * POST /paketInvestasis
     *
     * @param CreatePaketInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaketInvestasiAPIRequest $request)
    {
        $input = $request->all();

        $paketInvestasis = $this->paketInvestasiRepository->create($input);

        return $this->sendResponse($paketInvestasis->toArray(), 'Paket Investasi saved successfully');
    }

    /**
     * Display the specified PaketInvestasi.
     * GET|HEAD /paketInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaketInvestasi $paketInvestasi */
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            return $this->sendError('Paket Investasi not found');
        }

        return $this->sendResponse($paketInvestasi->toArray(), 'Paket Investasi retrieved successfully');
    }

    /**
     * Update the specified PaketInvestasi in storage.
     * PUT/PATCH /paketInvestasis/{id}
     *
     * @param  int $id
     * @param UpdatePaketInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaketInvestasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaketInvestasi $paketInvestasi */
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            return $this->sendError('Paket Investasi not found');
        }

        $paketInvestasi = $this->paketInvestasiRepository->update($input, $id);

        return $this->sendResponse($paketInvestasi->toArray(), 'PaketInvestasi updated successfully');
    }

    /**
     * Remove the specified PaketInvestasi from storage.
     * DELETE /paketInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaketInvestasi $paketInvestasi */
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            return $this->sendError('Paket Investasi not found');
        }

        $paketInvestasi->delete();

        return $this->sendResponse($id, 'Paket Investasi deleted successfully');
    }
}
