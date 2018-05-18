<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInvestorHasTransaksiInvestasiAPIRequest;
use App\Http\Requests\API\UpdateInvestorHasTransaksiInvestasiAPIRequest;
use App\Models\InvestorHasTransaksiInvestasi;
use App\Repositories\InvestorHasTransaksiInvestasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\TransaksiInvestasi;

/**
 * Class InvestorHasTransaksiInvestasiController
 * @package App\Http\Controllers\API
 */

class InvestorHasTransaksiInvestasiAPIController extends AppBaseController
{
    /** @var  InvestorHasTransaksiInvestasiRepository */
    private $investorHasTransaksiInvestasiRepository;

    public function __construct(InvestorHasTransaksiInvestasiRepository $investorHasTransaksiInvestasiRepo)
    {
        $this->investorHasTransaksiInvestasiRepository = $investorHasTransaksiInvestasiRepo;
    }

    /**
     * Display a listing of the InvestorHasTransaksiInvestasi.
     * GET|HEAD /investorHasTransaksiInvestasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investorHasTransaksiInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $this->investorHasTransaksiInvestasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $investorHasTransaksiInvestasis = $this->investorHasTransaksiInvestasiRepository->all();

        return $this->sendResponse($investorHasTransaksiInvestasis->toArray(), 'Investor Has Transaksi Investasis retrieved successfully');
    }

    /**
     * Store a newly created InvestorHasTransaksiInvestasi in storage.
     * POST /investorHasTransaksiInvestasis
     *
     * @param CreateInvestorHasTransaksiInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestorHasTransaksiInvestasiAPIRequest $request)
    {
        $input = $request->all();

        $transaksiInvestasi=TransaksiInvestasi::find($input['transaksi_investasis_id']);
        $investorHasTransaksiInvestasis = $this->investorHasTransaksiInvestasiRepository->create($input);


        return $this->sendResponse($investorHasTransaksiInvestasis->toArray(), 'Investor Has Transaksi Investasi saved successfully');
    }

    /**
     * Display the specified InvestorHasTransaksiInvestasi.
     * GET|HEAD /investorHasTransaksiInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InvestorHasTransaksiInvestasi $investorHasTransaksiInvestasi */
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            return $this->sendError('Investor Has Transaksi Investasi not found');
        }

        return $this->sendResponse($investorHasTransaksiInvestasi->toArray(), 'Investor Has Transaksi Investasi retrieved successfully');
    }

    /**
     * Update the specified InvestorHasTransaksiInvestasi in storage.
     * PUT/PATCH /investorHasTransaksiInvestasis/{id}
     *
     * @param  int $id
     * @param UpdateInvestorHasTransaksiInvestasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestorHasTransaksiInvestasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var InvestorHasTransaksiInvestasi $investorHasTransaksiInvestasi */
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            return $this->sendError('Investor Has Transaksi Investasi not found');
        }

        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->update($input, $id);

        return $this->sendResponse($investorHasTransaksiInvestasi->toArray(), 'InvestorHasTransaksiInvestasi updated successfully');
    }

    /**
     * Remove the specified InvestorHasTransaksiInvestasi from storage.
     * DELETE /investorHasTransaksiInvestasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InvestorHasTransaksiInvestasi $investorHasTransaksiInvestasi */
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            return $this->sendError('Investor Has Transaksi Investasi not found');
        }

        $investorHasTransaksiInvestasi->delete();

        return $this->sendResponse($id, 'Investor Has Transaksi Investasi deleted successfully');
    }
}
