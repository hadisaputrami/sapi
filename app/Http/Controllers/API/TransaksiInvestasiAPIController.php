<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiInvestasiAPIRequest;
use App\Http\Requests\API\UpdateTransaksiInvestasiAPIRequest;
use App\Models\TransaksiInvestasi;
use App\Repositories\TransaksiInvestasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransaksiInvestasiController
 * @package App\Http\Controllers\API
 */

class TransaksiInvestasiAPIController extends AppBaseController
{
    /** @var  TransaksiInvestasiRepository */
    private $transaksiInvestasiRepository;

    public function __construct(TransaksiInvestasiRepository $transaksiInvestasiRepo)
    {
        $this->transaksiInvestasiRepository = $transaksiInvestasiRepo;
    }

    /**
     * Display a listing of the TransaksiInvestasi.
     * GET|HEAD /transaksiInvestasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $this->transaksiInvestasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transaksiInvestasis = $this->transaksiInvestasiRepository->all();

        return $this->sendResponse($transaksiInvestasis->toArray(), 'Transaksi Investasis retrieved successfully');
    }

    /**
     * Store a newly created TransaksiInvestasi in storage.
     * POST /transaksiInvestasis
     *
     * @param CreateTransaksiInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiInvestasiAPIRequest $request)
    {
        $input = $request->all();

        $transaksiInvestasis = $this->transaksiInvestasiRepository->create($input);

        return $this->sendResponse($transaksiInvestasis->toArray(), 'Transaksi Investasi saved successfully');
    }

    /**
     * Display the specified TransaksiInvestasi.
     * GET|HEAD /transaksiInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransaksiInvestasi $transaksiInvestasi */
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            return $this->sendError('Transaksi Investasi not found');
        }

        return $this->sendResponse($transaksiInvestasi->toArray(), 'Transaksi Investasi retrieved successfully');
    }

    /**
     * Update the specified TransaksiInvestasi in storage.
     * PUT/PATCH /transaksiInvestasis/{id}
     *
     * @param  int $id
     * @param UpdateTransaksiInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiInvestasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransaksiInvestasi $transaksiInvestasi */
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            return $this->sendError('Transaksi Investasi not found');
        }

        $transaksiInvestasi = $this->transaksiInvestasiRepository->update($input, $id);

        return $this->sendResponse($transaksiInvestasi->toArray(), 'TransaksiInvestasi updated successfully');
    }

    /**
     * Remove the specified TransaksiInvestasi from storage.
     * DELETE /transaksiInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransaksiInvestasi $transaksiInvestasi */
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            return $this->sendError('Transaksi Investasi not found');
        }

        $transaksiInvestasi->delete();

        return $this->sendResponse($id, 'Transaksi Investasi deleted successfully');
    }
}
