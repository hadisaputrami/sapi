<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsuransiRequest;
use App\Http\Requests\UpdateAsuransiRequest;
use App\Repositories\AsuransiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AsuransiController extends AppBaseController
{
    /** @var  AsuransiRepository */
    private $asuransiRepository;

    public function __construct(AsuransiRepository $asuransiRepo)
    {
        $this->asuransiRepository = $asuransiRepo;
    }

    /**
     * Display a listing of the Asuransi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->asuransiRepository->pushCriteria(new RequestCriteria($request));
        $asuransis = $this->asuransiRepository->all();

        return view('asuransis.index')
            ->with('asuransis', $asuransis);
    }

    /**
     * Show the form for creating a new Asuransi.
     *
     * @return Response
     */
    public function create()
    {
        return view('asuransis.create');
    }

    /**
     * Store a newly created Asuransi in storage.
     *
     * @param CreateAsuransiRequest $request
     *
     * @return Response
     */
    public function store(CreateAsuransiRequest $request)
    {
        $input = $request->all();

        $asuransi = $this->asuransiRepository->create($input);

        Flash::success('Asuransi saved successfully.');

        return redirect(route('asuransis.index'));
    }

    /**
     * Display the specified Asuransi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            Flash::error('Asuransi not found');

            return redirect(route('asuransis.index'));
        }

        return view('asuransis.show')->with('asuransi', $asuransi);
    }

    /**
     * Show the form for editing the specified Asuransi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            Flash::error('Asuransi not found');

            return redirect(route('asuransis.index'));
        }

        return view('asuransis.edit')->with('asuransi', $asuransi);
    }

    /**
     * Update the specified Asuransi in storage.
     *
     * @param  int              $id
     * @param UpdateAsuransiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsuransiRequest $request)
    {
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            Flash::error('Asuransi not found');

            return redirect(route('asuransis.index'));
        }

        $asuransi = $this->asuransiRepository->update($request->all(), $id);

        Flash::success('Asuransi updated successfully.');

        return redirect(route('asuransis.index'));
    }

    /**
     * Remove the specified Asuransi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $asuransi = $this->asuransiRepository->findWithoutFail($id);

        if (empty($asuransi)) {
            Flash::error('Asuransi not found');

            return redirect(route('asuransis.index'));
        }

        $this->asuransiRepository->delete($id);

        Flash::success('Asuransi deleted successfully.');

        return redirect(route('asuransis.index'));
    }
}
