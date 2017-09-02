<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusTransaksiInvestasiRequest;
use App\Http\Requests\UpdateStatusTransaksiInvestasiRequest;
use App\Repositories\StatusTransaksiInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusTransaksiInvestasiController extends AppBaseController
{
    /** @var  StatusTransaksiInvestasiRepository */
    private $statusTransaksiInvestasiRepository;

    public function __construct(StatusTransaksiInvestasiRepository $statusTransaksiInvestasiRepo)
    {
        $this->statusTransaksiInvestasiRepository = $statusTransaksiInvestasiRepo;
    }

    /**
     * Display a listing of the StatusTransaksiInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusTransaksiInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $statusTransaksiInvestasis = $this->statusTransaksiInvestasiRepository->all();

        return view('status_transaksi_investasis.index')
            ->with('statusTransaksiInvestasis', $statusTransaksiInvestasis);
    }

    /**
     * Show the form for creating a new StatusTransaksiInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_transaksi_investasis.create');
    }

    /**
     * Store a newly created StatusTransaksiInvestasi in storage.
     *
     * @param CreateStatusTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusTransaksiInvestasiRequest $request)
    {
        $input = $request->all();

        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->create($input);

        Flash::success('Status Transaksi Investasi saved successfully.');

        return redirect(route('statusTransaksiInvestasis.index'));
    }

    /**
     * Display the specified StatusTransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($statusTransaksiInvestasi)) {
            Flash::error('Status Transaksi Investasi not found');

            return redirect(route('statusTransaksiInvestasis.index'));
        }

        return view('status_transaksi_investasis.show')->with('statusTransaksiInvestasi', $statusTransaksiInvestasi);
    }

    /**
     * Show the form for editing the specified StatusTransaksiInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($statusTransaksiInvestasi)) {
            Flash::error('Status Transaksi Investasi not found');

            return redirect(route('statusTransaksiInvestasis.index'));
        }

        return view('status_transaksi_investasis.edit')->with('statusTransaksiInvestasi', $statusTransaksiInvestasi);
    }

    /**
     * Update the specified StatusTransaksiInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdateStatusTransaksiInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusTransaksiInvestasiRequest $request)
    {
        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($statusTransaksiInvestasi)) {
            Flash::error('Status Transaksi Investasi not found');

            return redirect(route('statusTransaksiInvestasis.index'));
        }

        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->update($request->all(), $id);

        Flash::success('Status Transaksi Investasi updated successfully.');

        return redirect(route('statusTransaksiInvestasis.index'));
    }

    /**
     * Remove the specified StatusTransaksiInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusTransaksiInvestasi = $this->statusTransaksiInvestasiRepository->findWithoutFail($id);

        if (empty($statusTransaksiInvestasi)) {
            Flash::error('Status Transaksi Investasi not found');

            return redirect(route('statusTransaksiInvestasis.index'));
        }

        $this->statusTransaksiInvestasiRepository->delete($id);

        Flash::success('Status Transaksi Investasi deleted successfully.');

        return redirect(route('statusTransaksiInvestasis.index'));
    }
}
