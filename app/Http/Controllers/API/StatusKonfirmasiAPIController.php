<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusKonfirmasiAPIRequest;
use App\Http\Requests\API\UpdateStatusKonfirmasiAPIRequest;
use App\Models\StatusKonfirmasi;
use App\Repositories\StatusKonfirmasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusKonfirmasiController
 * @package App\Http\Controllers\API
 */

class StatusKonfirmasiAPIController extends AppBaseController
{
    /** @var  StatusKonfirmasiRepository */
    private $statusKonfirmasiRepository;

    public function __construct(StatusKonfirmasiRepository $statusKonfirmasiRepo)
    {
        $this->statusKonfirmasiRepository = $statusKonfirmasiRepo;
    }

    /**
     * Display a listing of the StatusKonfirmasi.
     * GET|HEAD /statusKonfirmasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusKonfirmasiRepository->pushCriteria(new RequestCriteria($request));
        $this->statusKonfirmasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusKonfirmasis = $this->statusKonfirmasiRepository->all();

        return $this->sendResponse($statusKonfirmasis->toArray(), 'Status Konfirmasis retrieved successfully');
    }

    /**
     * Store a newly created StatusKonfirmasi in storage.
     * POST /statusKonfirmasis
     *
     * @param CreateStatusKonfirmasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusKonfirmasiAPIRequest $request)
    {
        $input = $request->all();

        $statusKonfirmasis = $this->statusKonfirmasiRepository->create($input);

        return $this->sendResponse($statusKonfirmasis->toArray(), 'Status Konfirmasi saved successfully');
    }

    /**
     * Display the specified StatusKonfirmasi.
     * GET|HEAD /statusKonfirmasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusKonfirmasi $statusKonfirmasi */
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            return $this->sendError('Status Konfirmasi not found');
        }

        return $this->sendResponse($statusKonfirmasi->toArray(), 'Status Konfirmasi retrieved successfully');
    }

    /**
     * Update the specified StatusKonfirmasi in storage.
     * PUT/PATCH /statusKonfirmasis/{id}
     *
     * @param  int $id
     * @param UpdateStatusKonfirmasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusKonfirmasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusKonfirmasi $statusKonfirmasi */
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            return $this->sendError('Status Konfirmasi not found');
        }

        $statusKonfirmasi = $this->statusKonfirmasiRepository->update($input, $id);

        return $this->sendResponse($statusKonfirmasi->toArray(), 'StatusKonfirmasi updated successfully');
    }

    /**
     * Remove the specified StatusKonfirmasi from storage.
     * DELETE /statusKonfirmasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusKonfirmasi $statusKonfirmasi */
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            return $this->sendError('Status Konfirmasi not found');
        }

        $statusKonfirmasi->delete();

        return $this->sendResponse($id, 'Status Konfirmasi deleted successfully');
    }
}
