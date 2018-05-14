<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiPenjualanHasStatusPenjualanAPIRequest;
use App\Http\Requests\API\UpdateTransaksiPenjualanHasStatusPenjualanAPIRequest;
use App\Models\TransaksiPenjualanHasStatusPenjualan;
use App\Repositories\TransaksiPenjualanHasStatusPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransaksiPenjualanHasStatusPenjualanController
 * @package App\Http\Controllers\API
 */

class TransaksiPenjualanHasStatusPenjualanAPIController extends AppBaseController
{
    /** @var  TransaksiPenjualanHasStatusPenjualanRepository */
    private $transaksiPenjualanHasStatusPenjualanRepository;

    public function __construct(TransaksiPenjualanHasStatusPenjualanRepository $transaksiPenjualanHasStatusPenjualanRepo)
    {
        $this->transaksiPenjualanHasStatusPenjualanRepository = $transaksiPenjualanHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TransaksiPenjualanHasStatusPenjualan.
     * GET|HEAD /transaksiPenjualanHasStatusPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiPenjualanHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->transaksiPenjualanHasStatusPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transaksiPenjualanHasStatusPenjualans = $this->transaksiPenjualanHasStatusPenjualanRepository->all();

        return $this->sendResponse($transaksiPenjualanHasStatusPenjualans->toArray(), 'Transaksi Penjualan Has Status Penjualans retrieved successfully');
    }

    /**
     * Store a newly created TransaksiPenjualanHasStatusPenjualan in storage.
     * POST /transaksiPenjualanHasStatusPenjualans
     *
     * @param CreateTransaksiPenjualanHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiPenjualanHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $transaksiPenjualanHasStatusPenjualans = $this->transaksiPenjualanHasStatusPenjualanRepository->create($input);

        return $this->sendResponse($transaksiPenjualanHasStatusPenjualans->toArray(), 'Transaksi Penjualan Has Status Penjualan saved successfully');
    }

    /**
     * Display the specified TransaksiPenjualanHasStatusPenjualan.
     * GET|HEAD /transaksiPenjualanHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransaksiPenjualanHasStatusPenjualan $transaksiPenjualanHasStatusPenjualan */
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            return $this->sendError('Transaksi Penjualan Has Status Penjualan not found');
        }

        return $this->sendResponse($transaksiPenjualanHasStatusPenjualan->toArray(), 'Transaksi Penjualan Has Status Penjualan retrieved successfully');
    }

    /**
     * Update the specified TransaksiPenjualanHasStatusPenjualan in storage.
     * PUT/PATCH /transaksiPenjualanHasStatusPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateTransaksiPenjualanHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiPenjualanHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransaksiPenjualanHasStatusPenjualan $transaksiPenjualanHasStatusPenjualan */
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            return $this->sendError('Transaksi Penjualan Has Status Penjualan not found');
        }

        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->update($input, $id);

        return $this->sendResponse($transaksiPenjualanHasStatusPenjualan->toArray(), 'TransaksiPenjualanHasStatusPenjualan updated successfully');
    }

    /**
     * Remove the specified TransaksiPenjualanHasStatusPenjualan from storage.
     * DELETE /transaksiPenjualanHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransaksiPenjualanHasStatusPenjualan $transaksiPenjualanHasStatusPenjualan */
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            return $this->sendError('Transaksi Penjualan Has Status Penjualan not found');
        }

        $transaksiPenjualanHasStatusPenjualan->delete();

        return $this->sendResponse($id, 'Transaksi Penjualan Has Status Penjualan deleted successfully');
    }
}
