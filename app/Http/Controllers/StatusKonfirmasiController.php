<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusKonfirmasiRequest;
use App\Http\Requests\UpdateStatusKonfirmasiRequest;
use App\Repositories\StatusKonfirmasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusKonfirmasiController extends AppBaseController
{
    /** @var  StatusKonfirmasiRepository */
    private $statusKonfirmasiRepository;

    public function __construct(StatusKonfirmasiRepository $statusKonfirmasiRepo)
    {
        $this->statusKonfirmasiRepository = $statusKonfirmasiRepo;
    }

    /**
     * Display a listing of the StatusKonfirmasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusKonfirmasiRepository->pushCriteria(new RequestCriteria($request));
        $statusKonfirmasis = $this->statusKonfirmasiRepository->all();

        return view('status_konfirmasis.index')
            ->with('statusKonfirmasis', $statusKonfirmasis);
    }

    /**
     * Show the form for creating a new StatusKonfirmasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_konfirmasis.create');
    }

    /**
     * Store a newly created StatusKonfirmasi in storage.
     *
     * @param CreateStatusKonfirmasiRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusKonfirmasiRequest $request)
    {
        $input = $request->all();

        $statusKonfirmasi = $this->statusKonfirmasiRepository->create($input);

        Flash::success('Status Konfirmasi saved successfully.');

        return redirect(route('statusKonfirmasis.index'));
    }

    /**
     * Display the specified StatusKonfirmasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            Flash::error('Status Konfirmasi not found');

            return redirect(route('statusKonfirmasis.index'));
        }

        return view('status_konfirmasis.show')->with('statusKonfirmasi', $statusKonfirmasi);
    }

    /**
     * Show the form for editing the specified StatusKonfirmasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            Flash::error('Status Konfirmasi not found');

            return redirect(route('statusKonfirmasis.index'));
        }

        return view('status_konfirmasis.edit')->with('statusKonfirmasi', $statusKonfirmasi);
    }

    /**
     * Update the specified StatusKonfirmasi in storage.
     *
     * @param  int              $id
     * @param UpdateStatusKonfirmasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusKonfirmasiRequest $request)
    {
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            Flash::error('Status Konfirmasi not found');

            return redirect(route('statusKonfirmasis.index'));
        }

        $statusKonfirmasi = $this->statusKonfirmasiRepository->update($request->all(), $id);

        Flash::success('Status Konfirmasi updated successfully.');

        return redirect(route('statusKonfirmasis.index'));
    }

    /**
     * Remove the specified StatusKonfirmasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusKonfirmasi = $this->statusKonfirmasiRepository->findWithoutFail($id);

        if (empty($statusKonfirmasi)) {
            Flash::error('Status Konfirmasi not found');

            return redirect(route('statusKonfirmasis.index'));
        }

        $this->statusKonfirmasiRepository->delete($id);

        Flash::success('Status Konfirmasi deleted successfully.');

        return redirect(route('statusKonfirmasis.index'));
    }
}
