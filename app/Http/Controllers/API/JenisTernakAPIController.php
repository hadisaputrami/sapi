<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJenisTernakAPIRequest;
use App\Http\Requests\API\UpdateJenisTernakAPIRequest;
use App\Models\JenisTernak;
use App\Repositories\JenisTernakRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JenisTernakController
 * @package App\Http\Controllers\API
 */

class JenisTernakAPIController extends AppBaseController
{
    /** @var  JenisTernakRepository */
    private $jenisTernakRepository;

    public function __construct(JenisTernakRepository $jenisTernakRepo)
    {
        $this->jenisTernakRepository = $jenisTernakRepo;
    }

    /**
     * Display a listing of the JenisTernak.
     * GET|HEAD /jenisTernaks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisTernakRepository->pushCriteria(new RequestCriteria($request));
        $this->jenisTernakRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jenisTernaks = $this->jenisTernakRepository->all();

        return $this->sendResponse($jenisTernaks->toArray(), 'Jenis Ternaks retrieved successfully');
    }

    /**
     * Store a newly created JenisTernak in storage.
     * POST /jenisTernaks
     *
     * @param CreateJenisTernakAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisTernakAPIRequest $request)
    {
        $input = $request->all();

        $jenisTernaks = $this->jenisTernakRepository->create($input);

        return $this->sendResponse($jenisTernaks->toArray(), 'Jenis Ternak saved successfully');
    }

    /**
     * Display the specified JenisTernak.
     * GET|HEAD /jenisTernaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var JenisTernak $jenisTernak */
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            return $this->sendError('Jenis Ternak not found');
        }

        return $this->sendResponse($jenisTernak->toArray(), 'Jenis Ternak retrieved successfully');
    }

    /**
     * Update the specified JenisTernak in storage.
     * PUT/PATCH /jenisTernaks/{id}
     *
     * @param  int $id
     * @param UpdateJenisTernakAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisTernakAPIRequest $request)
    {
        $input = $request->all();

        /** @var JenisTernak $jenisTernak */
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            return $this->sendError('Jenis Ternak not found');
        }

        $jenisTernak = $this->jenisTernakRepository->update($input, $id);

        return $this->sendResponse($jenisTernak->toArray(), 'JenisTernak updated successfully');
    }

    /**
     * Remove the specified JenisTernak from storage.
     * DELETE /jenisTernaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var JenisTernak $jenisTernak */
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            return $this->sendError('Jenis Ternak not found');
        }

        $jenisTernak->delete();

        return $this->sendResponse($id, 'Jenis Ternak deleted successfully');
    }
}
