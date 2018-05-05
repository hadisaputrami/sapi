<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKonfirmasiInvestorRequest;
use App\Http\Requests\UpdateKonfirmasiInvestorRequest;
use App\Repositories\KonfirmasiInvestorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KonfirmasiInvestorController extends AppBaseController
{
    /** @var  KonfirmasiInvestorRepository */
    private $konfirmasiInvestorRepository;

    public function __construct(KonfirmasiInvestorRepository $konfirmasiInvestorRepo)
    {
        $this->konfirmasiInvestorRepository = $konfirmasiInvestorRepo;
    }

    /**
     * Display a listing of the KonfirmasiInvestor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->konfirmasiInvestorRepository->pushCriteria(new RequestCriteria($request));
        $konfirmasiInvestors = $this->konfirmasiInvestorRepository->all();

        return view('konfirmasi_investors.index')
            ->with('konfirmasiInvestors', $konfirmasiInvestors);
    }

    /**
     * Show the form for creating a new KonfirmasiInvestor.
     *
     * @return Response
     */
    public function create()
    {
        return view('konfirmasi_investors.create');
    }

    /**
     * Store a newly created KonfirmasiInvestor in storage.
     *
     * @param CreateKonfirmasiInvestorRequest $request
     *
     * @return Response
     */
    public function store(CreateKonfirmasiInvestorRequest $request)
    {
        $input = $request->all();

        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->create($input);

        Flash::success('Konfirmasi Investor saved successfully.');

        return redirect(route('konfirmasiInvestors.index'));
    }

    /**
     * Display the specified KonfirmasiInvestor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            Flash::error('Konfirmasi Investor not found');

            return redirect(route('konfirmasiInvestors.index'));
        }

        return view('konfirmasi_investors.show')->with('konfirmasiInvestor', $konfirmasiInvestor);
    }

    /**
     * Show the form for editing the specified KonfirmasiInvestor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            Flash::error('Konfirmasi Investor not found');

            return redirect(route('konfirmasiInvestors.index'));
        }

        return view('konfirmasi_investors.edit')->with('konfirmasiInvestor', $konfirmasiInvestor);
    }

    /**
     * Update the specified KonfirmasiInvestor in storage.
     *
     * @param  int              $id
     * @param UpdateKonfirmasiInvestorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKonfirmasiInvestorRequest $request)
    {
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            Flash::error('Konfirmasi Investor not found');

            return redirect(route('konfirmasiInvestors.index'));
        }

        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->update($request->all(), $id);

        Flash::success('Konfirmasi Investor updated successfully.');

        return redirect(route('konfirmasiInvestors.index'));
    }

    /**
     * Remove the specified KonfirmasiInvestor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            Flash::error('Konfirmasi Investor not found');

            return redirect(route('konfirmasiInvestors.index'));
        }

        $this->konfirmasiInvestorRepository->delete($id);

        Flash::success('Konfirmasi Investor deleted successfully.');

        return redirect(route('konfirmasiInvestors.index'));
    }
}
