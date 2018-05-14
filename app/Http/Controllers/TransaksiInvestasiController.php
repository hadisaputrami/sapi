<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiInvestasiRequest;
use App\Http\Requests\UpdateTransaksiInvestasiRequest;
use App\Repositories\TransaksiInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\PaketInvestasi;
use App\Models\Asuransi;

class TransaksiInvestasiController extends AppBaseController
{
    /** @var  TransaksiInvestasiRepository */
    private $transaksiInvestasiRepository;

    public function __construct(TransaksiInvestasiRepository $transaksiInvestasiRepo)
    {
        $this->transaksiInvestasiRepository = $transaksiInvestasiRepo;
    }

    /**
     * Display a listing of the TransaksiInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $transaksiInvestasis = $this->transaksiInvestasiRepository->all();

        return view('transaksi_investasis.index')
            ->with('transaksiInvestasis', $transaksiInvestasis);
    }

    /**
     * Show the form for creating a new TransaksiInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        $paket=PaketInvestasi::pluck('nama','id');
        $asuransi=Asuransi::pluck('premi','id');
        return view('transaksi_investasis.create',
            compact('paket','asuransi'));
    }

    /**
     * Store a newly created TransaksiInvestasi in storage.
     *
     * @param CreateTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiInvestasiRequest $request)
    {
        $input = $request->all();

        $transaksiInvestasi = $this->transaksiInvestasiRepository->create($input);

        Flash::success('Transaksi Investasi saved successfully.');

        return redirect(route('transaksiInvestasis.index'));
    }

    /**
     * Display the specified TransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            Flash::error('Transaksi Investasi not found');

            return redirect(route('transaksiInvestasis.index'));
        }

        return view('transaksi_investasis.show')->with('transaksiInvestasi', $transaksiInvestasi);
    }

    /**
     * Show the form for editing the specified TransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            Flash::error('Transaksi Investasi not found');

            return redirect(route('transaksiInvestasis.index'));
        }

        return view('transaksi_investasis.edit')->with('transaksiInvestasi', $transaksiInvestasi);
    }

    /**
     * Update the specified TransaksiInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdateTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiInvestasiRequest $request)
    {
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            Flash::error('Transaksi Investasi not found');

            return redirect(route('transaksiInvestasis.index'));
        }

        $transaksiInvestasi = $this->transaksiInvestasiRepository->update($request->all(), $id);

        Flash::success('Transaksi Investasi updated successfully.');

        return redirect(route('transaksiInvestasis.index'));
    }

    /**
     * Remove the specified TransaksiInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaksiInvestasi = $this->transaksiInvestasiRepository->findWithoutFail($id);

        if (empty($transaksiInvestasi)) {
            Flash::error('Transaksi Investasi not found');

            return redirect(route('transaksiInvestasis.index'));
        }

        $this->transaksiInvestasiRepository->delete($id);

        Flash::success('Transaksi Investasi deleted successfully.');

        return redirect(route('transaksiInvestasis.index'));
    }
}
