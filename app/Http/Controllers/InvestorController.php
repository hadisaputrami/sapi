<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvestorRequest;
use App\Http\Requests\UpdateInvestorRequest;
use App\Repositories\InvestorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InvestorController extends AppBaseController
{
    /** @var  InvestorRepository */
    private $investorRepository;

    public function __construct(InvestorRepository $investorRepo)
    {
        $this->investorRepository = $investorRepo;
    }

    /**
     * Display a listing of the Investor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investorRepository->pushCriteria(new RequestCriteria($request));
        $investors = $this->investorRepository->all();

        return view('investors.index')
            ->with('investors', $investors);
    }

    /**
     * Show the form for creating a new Investor.
     *
     * @return Response
     */
    public function create()
    {
        return view('investors.create');
    }

    /**
     * Store a newly created Investor in storage.
     *
     * @param CreateInvestorRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestorRequest $request)
    {
        $input = $request->all();

        $investor = $this->investorRepository->create($input);

        Flash::success('Investor saved successfully.');

        return redirect(route('investors.index'));
    }

    /**
     * Display the specified Investor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            Flash::error('Investor not found');

            return redirect(route('investors.index'));
        }

        return view('investors.show')->with('investor', $investor);
    }

    /**
     * Show the form for editing the specified Investor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            Flash::error('Investor not found');

            return redirect(route('investors.index'));
        }

        return view('investors.edit')->with('investor', $investor);
    }

    /**
     * Update the specified Investor in storage.
     *
     * @param  int              $id
     * @param UpdateInvestorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestorRequest $request)
    {
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            Flash::error('Investor not found');

            return redirect(route('investors.index'));
        }

        $investor = $this->investorRepository->update($request->all(), $id);

        Flash::success('Investor updated successfully.');

        return redirect(route('investors.index'));
    }

    /**
     * Remove the specified Investor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            Flash::error('Investor not found');

            return redirect(route('investors.index'));
        }

        $this->investorRepository->delete($id);

        Flash::success('Investor deleted successfully.');

        return redirect(route('investors.index'));
    }
}
