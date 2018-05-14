<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransInvesHasStatusInvesAPIRequest;
use App\Http\Requests\API\UpdateTransInvesHasStatusInvesAPIRequest;
use App\Models\TransInvesHasStatusInves;
use App\Repositories\TransInvesHasStatusInvesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransInvesHasStatusInvesController
 * @package App\Http\Controllers\API
 */

class TransInvesHasStatusInvesAPIController extends AppBaseController
{
    /** @var  TransInvesHasStatusInvesRepository */
    private $transInvesHasStatusInvesRepository;

    public function __construct(TransInvesHasStatusInvesRepository $transInvesHasStatusInvesRepo)
    {
        $this->transInvesHasStatusInvesRepository = $transInvesHasStatusInvesRepo;
    }

    /**
     * Display a listing of the TransInvesHasStatusInves.
     * GET|HEAD /transInvesHasStatusInves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transInvesHasStatusInvesRepository->pushCriteria(new RequestCriteria($request));
        $this->transInvesHasStatusInvesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->all();

        return $this->sendResponse($transInvesHasStatusInves->toArray(), 'Trans Inves Has Status Inves retrieved successfully');
    }

    /**
     * Store a newly created TransInvesHasStatusInves in storage.
     * POST /transInvesHasStatusInves
     *
     * @param CreateTransInvesHasStatusInvesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransInvesHasStatusInvesAPIRequest $request)
    {
        $input = $request->all();

        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->create($input);

        return $this->sendResponse($transInvesHasStatusInves->toArray(), 'Trans Inves Has Status Inves saved successfully');
    }

    /**
     * Display the specified TransInvesHasStatusInves.
     * GET|HEAD /transInvesHasStatusInves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransInvesHasStatusInves $transInvesHasStatusInves */
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            return $this->sendError('Trans Inves Has Status Inves not found');
        }

        return $this->sendResponse($transInvesHasStatusInves->toArray(), 'Trans Inves Has Status Inves retrieved successfully');
    }

    /**
     * Update the specified TransInvesHasStatusInves in storage.
     * PUT/PATCH /transInvesHasStatusInves/{id}
     *
     * @param  int $id
     * @param UpdateTransInvesHasStatusInvesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransInvesHasStatusInvesAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransInvesHasStatusInves $transInvesHasStatusInves */
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            return $this->sendError('Trans Inves Has Status Inves not found');
        }

        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->update($input, $id);

        return $this->sendResponse($transInvesHasStatusInves->toArray(), 'TransInvesHasStatusInves updated successfully');
    }

    /**
     * Remove the specified TransInvesHasStatusInves from storage.
     * DELETE /transInvesHasStatusInves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransInvesHasStatusInves $transInvesHasStatusInves */
        $transInvesHasStatusInves = $this->transInvesHasStatusInvesRepository->findWithoutFail($id);

        if (empty($transInvesHasStatusInves)) {
            return $this->sendError('Trans Inves Has Status Inves not found');
        }

        $transInvesHasStatusInves->delete();

        return $this->sendResponse($id, 'Trans Inves Has Status Inves deleted successfully');
    }
}
