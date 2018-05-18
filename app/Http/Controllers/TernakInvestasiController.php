<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTernakInvestasiRequest;
use App\Http\Requests\UpdateTernakInvestasiRequest;
use App\Repositories\TernakInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Ternak;
use App\Models\TransaksiInvestasi;

class TernakInvestasiController extends AppBaseController
{
    /** @var  TernakInvestasiRepository */
    private $ternakInvestasiRepository;

    public function __construct(TernakInvestasiRepository $ternakInvestasiRepo)
    {
        $this->ternakInvestasiRepository = $ternakInvestasiRepo;
    }

    /**
     * Display a listing of the TernakInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ternakInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $ternakInvestasis = $this->ternakInvestasiRepository->all();

        return view('ternak_investasis.index')
            ->with('ternakInvestasis', $ternakInvestasis);
    }

    /**
     * Show the form for creating a new TernakInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        $transaksi=TransaksiInvestasi::pluck('kode_transaksi','id');
        $ternak=Ternak::pluck('kode','id');
        return view('ternak_investasis.create',
            compact('ternak','transaksi'));
    }

    /**
     * Store a newly created TernakInvestasi in storage.
     *
     * @param CreateTernakInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakInvestasiRequest $request)
    {
        $input = $request->all();

        $ternakInvestasi = $this->ternakInvestasiRepository->create($input);

        Flash::success('Ternak Investasi saved successfully.');

        return redirect(route('ternakInvestasis.index'));
    }

    /**
     * Display the specified TernakInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            Flash::error('Ternak Investasi not found');

            return redirect(route('ternakInvestasis.index'));
        }

        return view('ternak_investasis.show')->with('ternakInvestasi', $ternakInvestasi);
    }

    /**
     * Show the form for editing the specified TernakInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);
        $transaksi=TransaksiInvestasi::pluck('kode_transaksi','id');
        $ternak=Ternak::pluck('kode','id');

        if (empty($ternakInvestasi)) {
            Flash::error('Ternak Investasi not found');

            return redirect(route('ternakInvestasis.index'));
        }

        return view('ternak_investasis.edit',
            compact('ternakInvestasi','transaksi','ternak'));
    }

    /**
     * Update the specified TernakInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdateTernakInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakInvestasiRequest $request)
    {
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            Flash::error('Ternak Investasi not found');

            return redirect(route('ternakInvestasis.index'));
        }

        $ternakInvestasi = $this->ternakInvestasiRepository->update($request->all(), $id);

        Flash::success('Ternak Investasi updated successfully.');

        return redirect(route('ternakInvestasis.index'));
    }

    /**
     * Remove the specified TernakInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ternakInvestasi = $this->ternakInvestasiRepository->findWithoutFail($id);

        if (empty($ternakInvestasi)) {
            Flash::error('Ternak Investasi not found');

            return redirect(route('ternakInvestasis.index'));
        }

        $this->ternakInvestasiRepository->delete($id);

        Flash::success('Ternak Investasi deleted successfully.');

        return redirect(route('ternakInvestasis.index'));
    }
}
