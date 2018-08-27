<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKonfirmasiInvestorAPIRequest;
use App\Http\Requests\API\UpdateKonfirmasiInvestorAPIRequest;
use App\Models\KonfirmasiInvestor;
use App\Models\StatusKonfirmasi;
use App\Repositories\KonfirmasiInvestorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;

/**
 * Class KonfirmasiInvestorController
 * @package App\Http\Controllers\API
 */

class KonfirmasiInvestorAPIController extends AppBaseController
{
    /** @var  KonfirmasiInvestorRepository */
    private $konfirmasiInvestorRepository;

    public function __construct(KonfirmasiInvestorRepository $konfirmasiInvestorRepo)
    {
        $this->konfirmasiInvestorRepository = $konfirmasiInvestorRepo;
    }

    /**
     * Display a listing of the KonfirmasiInvestor.
     * GET|HEAD /konfirmasiInvestors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->konfirmasiInvestorRepository->pushCriteria(new RequestCriteria($request));
        $this->konfirmasiInvestorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $konfirmasiInvestors = $this->konfirmasiInvestorRepository->all();

        return $this->sendResponse($konfirmasiInvestors->toArray(), 'Konfirmasi Investors retrieved successfully');
    }

    /**
     * Store a newly created KonfirmasiInvestor in storage.
     * POST /konfirmasiInvestors
     *
     * @param CreateKonfirmasiInvestorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKonfirmasiInvestorAPIRequest $request)
    {
        try{
            DB::beginTransaction();

            $input = $request->all();
            $input['investors_id']=Auth::user()->investor->id;

            $statusKonfirmasi=StatusKonfirmasi::where('nama','Menunggu Konfirmasi')->first();
            $input['status_konfirmasis_id']=$statusKonfirmasi->id;

           $konfirmasiInvestors = $this->konfirmasiInvestorRepository->create($input);

            DB::commit();

        return $this->sendResponse($konfirmasiInvestors->toArray(), 'Konfirmasi Investor saved successfully');

        }catch(Exception $e){
            DB::rollback();
            return $this->sendError($e->getMessage());


        }
    }

    /**
     * Display the specified KonfirmasiInvestor.
     * GET|HEAD /konfirmasiInvestors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KonfirmasiInvestor $konfirmasiInvestor */
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            return $this->sendError('Konfirmasi Investor not found');
        }

        return $this->sendResponse($konfirmasiInvestor->toArray(), 'Konfirmasi Investor retrieved successfully');
    }

    /**
     * Update the specified KonfirmasiInvestor in storage.
     * PUT/PATCH /konfirmasiInvestors/{id}
     *
     * @param  int $id
     * @param UpdateKonfirmasiInvestorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKonfirmasiInvestorAPIRequest $request)
    {
        $input = $request->all();

        /** @var KonfirmasiInvestor $konfirmasiInvestor */
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            return $this->sendError('Konfirmasi Investor not found');
        }

        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->update($input, $id);

        return $this->sendResponse($konfirmasiInvestor->toArray(), 'KonfirmasiInvestor updated successfully');
    }

    /**
     * Remove the specified KonfirmasiInvestor from storage.
     * DELETE /konfirmasiInvestors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KonfirmasiInvestor $konfirmasiInvestor */
        $konfirmasiInvestor = $this->konfirmasiInvestorRepository->findWithoutFail($id);

        if (empty($konfirmasiInvestor)) {
            return $this->sendError('Konfirmasi Investor not found');
        }

        $konfirmasiInvestor->delete();

        return $this->sendResponse($id, 'Konfirmasi Investor deleted successfully');
    }
}
