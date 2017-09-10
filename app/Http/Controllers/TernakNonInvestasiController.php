<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTernakNonInvestasiRequest;
use App\Http\Requests\UpdateTernakNonInvestasiRequest;
use App\Repositories\TernakNonInvestasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TernakNonInvestasiController extends AppBaseController
{
    /** @var  TernakNonInvestasiRepository */
    private $ternakNonInvestasiRepository;

    public function __construct(TernakNonInvestasiRepository $ternakNonInvestasiRepo)
    {
        $this->ternakNonInvestasiRepository = $ternakNonInvestasiRepo;
    }

    /**
     * Display a listing of the TernakNonInvestasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ternakNonInvestasiRepository->pushCriteria(new RequestCriteria($request));
        $ternakNonInvestasis = $this->ternakNonInvestasiRepository->all();

        return view('ternak_non_investasis.index')
            ->with('ternakNonInvestasis', $ternakNonInvestasis);
    }

    /**
     * Show the form for creating a new TernakNonInvestasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('ternak_non_investasis.create');
    }

    /**
     * Store a newly created TernakNonInvestasi in storage.
     *
     * @param CreateTernakNonInvestasiRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakNonInvestasiRequest $request)
    {
        $input = $request->all();

        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->create($input);

        Flash::success('Ternak Non Investasi saved successfully.');

        return redirect(route('ternakNonInvestasis.index'));
    }

    /**
     * Display the specified TernakNonInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            Flash::error('Ternak Non Investasi not found');

            return redirect(route('ternakNonInvestasis.index'));
        }

        return view('ternak_non_investasis.show')->with('ternakNonInvestasi', $ternakNonInvestasi);
    }

    /**
     * Show the form for editing the specified TernakNonInvestasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            Flash::error('Ternak Non Investasi not found');

            return redirect(route('ternakNonInvestasis.index'));
        }

        return view('ternak_non_investasis.edit')->with('ternakNonInvestasi', $ternakNonInvestasi);
    }

    /**
     * Update the specified TernakNonInvestasi in storage.
     *
     * @param  int              $id
     * @param UpdateTernakNonInvestasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakNonInvestasiRequest $request)
    {
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            Flash::error('Ternak Non Investasi not found');

            return redirect(route('ternakNonInvestasis.index'));
        }

        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->update($request->all(), $id);

        Flash::success('Ternak Non Investasi updated successfully.');

        return redirect(route('ternakNonInvestasis.index'));
    }

    /**
     * Remove the specified TernakNonInvestasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ternakNonInvestasi = $this->ternakNonInvestasiRepository->findWithoutFail($id);

        if (empty($ternakNonInvestasi)) {
            Flash::error('Ternak Non Investasi not found');

            return redirect(route('ternakNonInvestasis.index'));
        }

        $this->ternakNonInvestasiRepository->delete($id);

        Flash::success('Ternak Non Investasi deleted successfully.');

        return redirect(route('ternakNonInvestasis.index'));
    }
}
