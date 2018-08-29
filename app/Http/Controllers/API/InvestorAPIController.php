<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInvestorAPIRequest;
use App\Http\Requests\API\UpdateInvestorAPIRequest;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;
use App\Models\Investor;
use App\Repositories\InvestorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InvestorController
 * @package App\Http\Controllers\API
 */

class InvestorAPIController extends AppBaseController
{
    /** @var  InvestorRepository */
    private $investorRepository;

    public function __construct(InvestorRepository $investorRepo)
    {
        $this->investorRepository = $investorRepo;
    }

    /**
     * Display a listing of the Investor.
     * GET|HEAD /investors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investorRepository->pushCriteria(new RequestCriteria($request));
        $this->investorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $investors = $this->investorRepository->all();

        return $this->sendResponse($investors->toArray(), 'Investors retrieved successfully');
    }

    /**
     * Store a newly created Investor in storage.
     * POST /investors
     *
     * @param CreateInvestorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestorAPIRequest $request)
    {
        $input = $request->all();
        $requestInvestor = $input;

     //   $investors = $this->investorRepository->create($input);
            
        try{
             DB::beginTransaction();
            $user= User::create([
                'name' => $requestInvestor['name'],
                'email' => $requestInvestor['email'],
                'password' => bcrypt($requestInvestor['password']),
            ]); 

            $role=Role::where('name','Investor')->firstOrFail();
            $user->attach($role);
         

            $requestInvestor['users_id']=$user->id;
            $investor=Investor::create($requestInvestor);
        
            DB::commit();

            Session::flash('flash_message', 'Investor Berhasil Registrasi');
        }catch(Exception $e){
            DB::rollback();  }    


        return $this->sendResponse($investor->toArray(), 'Investor saved successfully');
                                   
    }

    /**
     * Display the specified Investor.
     * GET|HEAD /investors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Investor $investor */
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            return $this->sendError('Investor not found');
        }

        return $this->sendResponse($investor->toArray(), 'Investor retrieved successfully');
    }

    /**
     * Update the specified Investor in storage.
     * PUT/PATCH /investors/{id}
     *
     * @param  int $id
     * @param UpdateInvestorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Investor $investor */
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            return $this->sendError('Investor not found');
        }

        $investor = $this->investorRepository->update($input, $id);

        return $this->sendResponse($investor->toArray(), 'Investor updated successfully');


    }

    /**
     * Remove the specified Investor from storage.
     * DELETE /investors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Investor $investor */
        $investor = $this->investorRepository->findWithoutFail($id);

        if (empty($investor)) {
            return $this->sendError('Investor not found');
        }

        $investor->delete();

        return $this->sendResponse($id, 'Investor deleted successfully');
    }
}
