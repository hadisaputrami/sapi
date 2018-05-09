<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeternakRequest;
use App\Http\Requests\UpdatePeternakRequest;
use App\Models\Peternak;
use App\Repositories\PeternakRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Role;
use App\Models\Biodata;

class PeternakController extends AppBaseController
{
    /** @var  PeternakRepository */
    private $peternakRepository;

    public function __construct(PeternakRepository $peternakRepo)
    {
        $this->peternakRepository = $peternakRepo;
    }

    /**
     * Display a listing of the Peternak.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->peternakRepository->pushCriteria(new RequestCriteria($request));
        $peternaks = $this->peternakRepository->all();

        return view('peternaks.index')
            ->with('peternaks', $peternaks);
    }

    /**
     * Show the form for creating a new Peternak.
     *
     * @return Response
     */
    public function create()
    {
        return view('peternaks.create');
    }

    /**
     * Store a newly created Peternak in storage.
     *
     * @param CreatePeternakRequest $request
     *
     * @return Response
     */
    public function store(CreatePeternakRequest $request)
    {
        $input = $request->all();

        $requestUser=$input;
        $requestPeternak=$input;

        try{
            DB::beginTransaction();
            $user=User::create([
                'name' => $requestUser['name'],
                'email' => $requestUser['email'],
                'password' => bcrypt($requestUser['password']),
            ]);

            $biodata=Biodata::create([
                'users_id'=>$user->id,
                'kontak'=>$requestUser['kontak']
            ]);



            $role=Role::where('name','peternak')->firstOrFail();
            $user->attachRole($role);

            Peternak::create([
                'users_id'=>$user->id
            ]);
        
            DB::commit();

            Session::flash('flash_message', 'Peternak Berhasil Registrasi');
        }catch(\Exception $e){
            DB::rollback();

            Session::flash('flash_message', 'Peternak Gagal Registrasi');
        }

        Flash::success('Peternak saved successfully.');

        return redirect(route('peternaks.index'));
    }

    /**
     * Display the specified Peternak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peternak = $this->peternakRepository->findWithoutFail($id);

        if (empty($peternak)) {
            Flash::error('Peternak not found');

            return redirect(route('peternaks.index'));
        }

        return view('peternaks.show')->with('peternak', $peternak);
    }

    /**
     * Show the form for editing the specified Peternak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peternak = $this->peternakRepository->findWithoutFail($id);

        if (empty($peternak)) {
            Flash::error('Peternak not found');

            return redirect(route('peternaks.index'));
        }

        return view('peternaks.edit')->with('peternak', $peternak);
    }

    /**
     * Update the specified Peternak in storage.
     *
     * @param  int              $id
     * @param UpdatePeternakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeternakRequest $request)
    {

        $requestData = $request->all();

         try{
            DB::beginTransaction();

            $requestPeternak['users_id']=$user->id;
            $peternak=Peternak::create($requestPeternak);
           
            DB::commit();

            Session::flash('flash_message', 'Peternak Berhasil Diubah');
        }catch(Exception $e){
            DB::rollback();

            Session::flash('flash_message', 'Data Gagal Diubah');
        }

        $peternak = $this->peternakRepository->findWithoutFail($id);

        if (empty($peternak)) {
            Flash::error('Peternak not found');

            return redirect(route('peternaks.index'));
        }

        $peternak = $this->peternakRepository->update($request->all(), $id);

        Flash::success('Peternak updated successfully.');

        return redirect(route('peternaks.index'));
    }

    /**
     * Remove the specified Peternak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peternak = $this->peternakRepository->findWithoutFail($id);

        if (empty($peternak)) {
            Flash::error('Peternak not found');

            return redirect(route('peternaks.index'));
        }

        $this->peternakRepository->delete($id);

        Flash::success('Peternak deleted successfully.');

        return redirect(route('peternaks.index'));
    }
}
