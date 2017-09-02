<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvestorHasTransaksiInvestasiRequest;
use App\Http\Requests\UpdateInvestorHasTransaksiInvestasiRequest;
use App\Repositories\InvestorHasTransaksiInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InvestorHasTransaksiInvestasiController extends AppBaseController
{
    /** @var  InvestorHasTransaksiInvestasiRepository */
    private $investorHasTransaksiInvestasiRepository;

    public function __construct(InvestorHasTransaksiInvestasiRepository $investorHasTransaksiInvestasiRepo)
    {
        $this->investorHasTransaksiInvestasiRepository = $investorHasTransaksiInvestasiRepo;
    }

    /**
     * Display a listing of the InvestorHasTransaksiInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investorHasTransaksiInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $investorHasTransaksiInvestasis = $this->investorHasTransaksiInvestasiRepository->all();

        return view('investor_has_transaksi_investasis.index')
            ->with('investorHasTransaksiInvestasis', $investorHasTransaksiInvestasis);
    }

    /**
     * Show the form for creating a new InvestorHasTransaksiInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('investor_has_transaksi_investasis.create');
    }

    /**
     * Store a newly created InvestorHasTransaksiInvestasi in storage.
     *
     * @param CreateInvestorHasTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestorHasTransaksiInvestasiRequest $request)
    {
        $input = $request->all();

        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->create($input);

        Flash::success('Investor Has Transaksi Investasi saved successfully.');

        return redirect(route('investorHasTransaksiInvestasis.index'));
    }

    /**
     * Display the specified InvestorHasTransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            Flash::error('Investor Has Transaksi Investasi not found');

            return redirect(route('investorHasTransaksiInvestasis.index'));
        }

        return view('investor_has_transaksi_investasis.show')->with('investorHasTransaksiInvestasi', $investorHasTransaksiInvestasi);
    }

    /**
     * Show the form for editing the specified InvestorHasTransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            Flash::error('Investor Has Transaksi Investasi not found');

            return redirect(route('investorHasTransaksiInvestasis.index'));
        }

        return view('investor_has_transaksi_investasis.edit')->with('investorHasTransaksiInvestasi', $investorHasTransaksiInvestasi);
    }

    /**
     * Update the specified InvestorHasTransaksiInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdateInvestorHasTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestorHasTransaksiInvestasiRequest $request)
    {
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            Flash::error('Investor Has Transaksi Investasi not found');

            return redirect(route('investorHasTransaksiInvestasis.index'));
        }

        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->update($request->all(), $id);

        Flash::success('Investor Has Transaksi Investasi updated successfully.');

        return redirect(route('investorHasTransaksiInvestasis.index'));
    }

    /**
     * Remove the specified InvestorHasTransaksiInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $investorHasTransaksiInvestasi = $this->investorHasTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($investorHasTransaksiInvestasi)) {
            Flash::error('Investor Has Transaksi Investasi not found');

            return redirect(route('investorHasTransaksiInvestasis.index'));
        }

        $this->investorHasTransaksiInvestasiRepository->delete($id);

        Flash::success('Investor Has Transaksi Investasi deleted successfully.');

        return redirect(route('investorHasTransaksiInvestasis.index'));
    }
}
