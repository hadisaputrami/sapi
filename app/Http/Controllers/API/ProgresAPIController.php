<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProgresAPIRequest;
use App\Http\Requests\API\UpdateProgresAPIRequest;
use App\Models\Progres;
use App\Repositories\ProgresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProgresController
 * @package App\Http\Controllers\API
 */

class ProgresAPIController extends AppBaseController
{
    /** @var  ProgresRepository */
    private $progresRepository;

    public function __construct(ProgresRepository $progresRepo)
    {
        $this->progresRepository = $progresRepo;
    }

    /**
     * Display a listing of the Progres.
     * GET|HEAD /progres
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->progresRepository->pushCriteria(new RequestCriteria($request));
        $this->progresRepository->pushCriteria(new LimitOffsetCriteria($request));
        $progres = $this->progresRepository->all();

        return $this->sendResponse($progres->toArray(), 'Progres retrieved successfully');
    }

    /**
     * Store a newly created Progres in storage.
     * POST /progres
     *
     * @param CreateProgresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProgresAPIRequest $request)
    {
        $input = $request->all();

        $progres = $this->progresRepository->create($input);

        return $this->sendResponse($progres->toArray(), 'Progres saved successfully');
    }

    /**
     * Display the specified Progres.
     * GET|HEAD /progres/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Progres $progres */
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            return $this->sendError('Progres not found');
        }

        return $this->sendResponse($progres->toArray(), 'Progres retrieved successfully');
    }

    /**
     * Update the specified Progres in storage.
     * PUT/PATCH /progres/{id}
     *
     * @param  int $id
     * @param UpdateProgresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProgresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Progres $progres */
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            return $this->sendError('Progres not found');
        }

        $progres = $this->progresRepository->update($input, $id);

        return $this->sendResponse($progres->toArray(), 'Progres updated successfully');
    }

    /**
     * Remove the specified Progres from storage.
     * DELETE /progres/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Progres $progres */
        $progres = $this->progresRepository->findWithoutFail($id);

        if (empty($progres)) {
            return $this->sendError('Progres not found');
        }

        $progres->delete();

        return $this->sendResponse($id, 'Progres deleted successfully');
    }
}
