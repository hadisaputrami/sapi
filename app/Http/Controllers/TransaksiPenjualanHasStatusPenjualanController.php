<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiPenjualanHasStatusPenjualanRequest;
use App\Http\Requests\UpdateTransaksiPenjualanHasStatusPenjualanRequest;
use App\Repositories\TransaksiPenjualanHasStatusPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransaksiPenjualanHasStatusPenjualanController extends AppBaseController
{
    /** @var  TransaksiPenjualanHasStatusPenjualanRepository */
    private $transaksiPenjualanHasStatusPenjualanRepository;

    public function __construct(TransaksiPenjualanHasStatusPenjualanRepository $transaksiPenjualanHasStatusPenjualanRepo)
    {
        $this->transaksiPenjualanHasStatusPenjualanRepository = $transaksiPenjualanHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TransaksiPenjualanHasStatusPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiPenjualanHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $transaksiPenjualanHasStatusPenjualans = $this->transaksiPenjualanHasStatusPenjualanRepository->all();

        return view('transaksi_penjualan_has_status_penjualans.index')
            ->with('transaksiPenjualanHasStatusPenjualans', $transaksiPenjualanHasStatusPenjualans);
    }

    /**
     * Show the form for creating a new TransaksiPenjualanHasStatusPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaksi_penjualan_has_status_penjualans.create');
    }

    /**
     * Store a newly created TransaksiPenjualanHasStatusPenjualan in storage.
     *
     * @param CreateTransaksiPenjualanHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiPenjualanHasStatusPenjualanRequest $request)
    {
        $input = $request->all();

        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->create($input);

        Flash::success('Transaksi Penjualan Has Status Penjualan saved successfully.');

        return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
    }

    /**
     * Display the specified TransaksiPenjualanHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            Flash::error('Transaksi Penjualan Has Status Penjualan not found');

            return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
        }

        return view('transaksi_penjualan_has_status_penjualans.show')->with('transaksiPenjualanHasStatusPenjualan', $transaksiPenjualanHasStatusPenjualan);
    }

    /**
     * Show the form for editing the specified TransaksiPenjualanHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            Flash::error('Transaksi Penjualan Has Status Penjualan not found');

            return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
        }

        return view('transaksi_penjualan_has_status_penjualans.edit')->with('transaksiPenjualanHasStatusPenjualan', $transaksiPenjualanHasStatusPenjualan);
    }

    /**
     * Update the specified TransaksiPenjualanHasStatusPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateTransaksiPenjualanHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiPenjualanHasStatusPenjualanRequest $request)
    {
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            Flash::error('Transaksi Penjualan Has Status Penjualan not found');

            return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
        }

        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->update($request->all(), $id);

        Flash::success('Transaksi Penjualan Has Status Penjualan updated successfully.');

        return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
    }

    /**
     * Remove the specified TransaksiPenjualanHasStatusPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaksiPenjualanHasStatusPenjualan = $this->transaksiPenjualanHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualanHasStatusPenjualan)) {
            Flash::error('Transaksi Penjualan Has Status Penjualan not found');

            return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
        }

        $this->transaksiPenjualanHasStatusPenjualanRepository->delete($id);

        Flash::success('Transaksi Penjualan Has Status Penjualan deleted successfully.');

        return redirect(route('transaksiPenjualanHasStatusPenjualans.index'));
    }
}
