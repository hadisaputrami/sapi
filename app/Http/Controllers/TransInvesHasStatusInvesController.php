<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransInvesHasStatusInvesRequest;
use App\Http\Requests\UpdateTransInvesHasStatusInvesRequest;
use App\Repositories\TransInvesHasStatusInvesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransInvesHasStatusInvesController extends AppBaseController
{
    /** @var  TransInvesHasStatusInvesRepository */
    private $transInvesHasStatusInvesRepository;

    public function __construct(TransInvesHasStatusInvesRepository $transInvesHasStatusInvesRepo)
    {
        $this->transInvesHasStatusInvesRepository = $transInvesHasStatusInvesRepo;
    }

    /**
     * Display a listing of the TransInvesHasStatusInves.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transInvesHasStatusInvesRepository->pushCriteria(new RequestCriteria($request));
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->all();

        return view('trans_inves_has_status_inves.index')
            ->with('transInvesHasStatusInves', $transInvesHasStatusInves);
    }

    /**
     * Show the form for creating a new TransInvesHasStatusInves.
     *
     * @return Response
     */
    public function create()
    {
        return view('trans_inves_has_status_inves.create');
    }

    /**
     * Store a newly created TransInvesHasStatusInves in storage.
     *
     * @param CreateTransInvesHasStatusInvesRequest $request
     *
     * @return Response
     */
    public function store(CreateTransInvesHasStatusInvesRequest $request)
    {
        $input = $request->all();

        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->create($input);

        Flash::success('Trans Inves Has Status Inves saved successfully.');

        return redirect(route('transInvesHasStatusInves.index'));
    }

    /**
     * Display the specified TransInvesHasStatusInves.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            Flash::error('Trans Inves Has Status Inves not found');

            return redirect(route('transInvesHasStatusInves.index'));
        }

        return view('trans_inves_has_status_inves.show')->with('transInvesHasStatusInves', $transInvesHasStatusInves);
    }

    /**
     * Show the form for editing the specified TransInvesHasStatusInves.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            Flash::error('Trans Inves Has Status Inves not found');

            return redirect(route('transInvesHasStatusInves.index'));
        }

        return view('trans_inves_has_status_inves.edit')->with('transInvesHasStatusInves', $transInvesHasStatusInves);
    }

    /**
     * Update the specified TransInvesHasStatusInves in storage.
     *
     * @param  int              $id
     * @param UpdateTransInvesHasStatusInvesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransInvesHasStatusInvesRequest $request)
    {
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            Flash::error('Trans Inves Has Status Inves not found');

            return redirect(route('transInvesHasStatusInves.index'));
        }

        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->update($request->all(), $id);

        Flash::success('Trans Inves Has Status Inves updated successfully.');

        return redirect(route('transInvesHasStatusInves.index'));
    }

    /**
     * Remove the specified TransInvesHasStatusInves from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            Flash::error('Trans Inves Has Status Inves not found');

            return redirect(route('transInvesHasStatusInves.index'));
        }

        $this->transInvesHasStatusInvesRepository->delete($id);

        Flash::success('Trans Inves Has Status Inves deleted successfully.');

        return redirect(route('transInvesHasStatusInves.index'));
    }
}
