<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaketInvestasiRequest;
use App\Http\Requests\UpdatePaketInvestasiRequest;
use App\Repositories\PaketInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaketInvestasiController extends AppBaseController
{
    /** @var  PaketInvestasiRepository */
    private $paketInvestasiRepository;

    public function __construct(PaketInvestasiRepository $paketInvestasiRepo)
    {
        $this->paketInvestasiRepository = $paketInvestasiRepo;
    }

    /**
     * Display a listing of the PaketInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paketInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $paketInvestasis = $this->paketInvestasiRepository->all();

        return view('paket_investasis.index')
            ->with('paketInvestasis', $paketInvestasis);
    }

    /**
     * Show the form for creating a new PaketInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('paket_investasis.create');
    }

    /**
     * Store a newly created PaketInvestasi in storage.
     *
     * @param CreatePaketInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreatePaketInvestasiRequest $request)
    {
        $input = $request->all();

        $paketInvestasi = $this->paketInvestasiRepository->create($input);

        Flash::success('Paket Investasi saved successfully.');

        return redirect(route('paketInvestasis.index'));
    }

    /**
     * Display the specified PaketInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            Flash::error('Paket Investasi not found');

            return redirect(route('paketInvestasis.index'));
        }

        return view('paket_investasis.show')->with('paketInvestasi', $paketInvestasi);
    }

    /**
     * Show the form for editing the specified PaketInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            Flash::error('Paket Investasi not found');

            return redirect(route('paketInvestasis.index'));
        }

        return view('paket_investasis.edit')->with('paketInvestasi', $paketInvestasi);
    }

    /**
     * Update the specified PaketInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdatePaketInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaketInvestasiRequest $request)
    {
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            Flash::error('Paket Investasi not found');

            return redirect(route('paketInvestasis.index'));
        }

        $paketInvestasi = $this->paketInvestasiRepository->update($request->all(), $id);

        Flash::success('Paket Investasi updated successfully.');

        return redirect(route('paketInvestasis.index'));
    }

    /**
     * Remove the specified PaketInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paketInvestasi = $this->paketInvestasiRepository->findWithoutFail($id);

        if (empty($paketInvestasi)) {
            Flash::error('Paket Investasi not found');

            return redirect(route('paketInvestasis.index'));
        }

        $this->paketInvestasiRepository->delete($id);

        Flash::success('Paket Investasi deleted successfully.');

        return redirect(route('paketInvestasis.index'));
    }
}
