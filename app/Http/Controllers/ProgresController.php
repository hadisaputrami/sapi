<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgresRequest;
use App\Http\Requests\UpdateProgresRequest;
use App\Repositories\ProgresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProgresController extends AppBaseController
{
    /** @var  ProgresRepository */
    private $progresRepository;

    public function __construct(ProgresRepository $progresRepo)
    {
        $this->progresRepository = $progresRepo;
    }

    /**
     * Display a listing of the Progres.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->progresRepository->pushCriteria(new RequestCriteria($request));
        $progres = $this->progresRepository->all();

        return view('progres.index')
            ->with('progres', $progres);
    }

    /**
     * Show the form for creating a new Progres.
     *
     * @return Response
     */
    public function create()
    {
        return view('progres.create');
    }

    /**
     * Store a newly created Progres in storage.
     *
     * @param CreateProgresRequest $request
     *
     * @return Response
     */
    public function store(CreateProgresRequest $request)
    {
        $input = $request->all();

        $progres = $this->progresRepository->create($input);

        Flash::success('Progres saved successfully.');

        return redirect(route('progres.index'));
    }

    /**
     * Display the specified Progres.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            Flash::error('Progres not found');

            return redirect(route('progres.index'));
        }

        return view('progres.show')->with('progres', $progres);
    }

    /**
     * Show the form for editing the specified Progres.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            Flash::error('Progres not found');

            return redirect(route('progres.index'));
        }

        return view('progres.edit')->with('progres', $progres);
    }

    /**
     * Update the specified Progres in storage.
     *
     * @param  int              $id
     * @param UpdateProgresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgresRequest $request)
    {
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            Flash::error('Progres not found');

            return redirect(route('progres.index'));
        }

        $progres = $this->progresRepository->update($request->all(), $id);

        Flash::success('Progres updated successfully.');

        return redirect(route('progres.index'));
    }

    /**
     * Remove the specified Progres from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            Flash::error('Progres not found');

            return redirect(route('progres.index'));
        }

        $this->progresRepository->delete($id);

        Flash::success('Progres deleted successfully.');

        return redirect(route('progres.index'));
    }
}
