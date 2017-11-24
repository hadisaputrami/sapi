<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTernakRequest;
use App\Http\Requests\UpdateTernakRequest;
use App\Repositories\TernakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\JenisTernak;
use App\Models\Peternak;
use App\Models\Ternak;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TernakController extends AppBaseController
{
    /** @var  TernakRepository */
    private $ternakRepository;

    public function __construct(TernakRepository $ternakRepo)
    {
        $this->ternakRepository = $ternakRepo;
    }

    /**
     * Display a listing of the Ternak.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ternakRepository->pushCriteria(new RequestCriteria($request));
        $ternaks = $this->ternakRepository->all();

        $jenisTernak =JenisTernak::pluck('nama_jenis_ternaks','id');

        return view('ternaks.index',
            compact('ternaks','jenisTernak'));
    }

    /**
     * Show the form for creating a new Ternak.
     *
     * @return Response
     */
    public function create()
    {
         $jenisTernak =JenisTernak::pluck('nama_jenis_ternaks','id');
         $peternak=Peternak::with('user')->get()->pluck('user.name','id');

        return view('ternaks.create',
            compact('jenisTernak','peternak'));
    }

    /**
     * Store a newly created Ternak in storage.
     *
     * @param CreateTernakRequest $request
     *
     * @return Response
     */
    public function store(CreateTernakRequest $request)
    {
        $input = $request->all();

        $ternak = $this->ternakRepository->create($input);

        Flash::success('Ternak saved successfully.');

        return redirect(route('ternaks.index'));
    }

    /**
     * Display the specified Ternak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            Flash::error('Ternak not found');

            return redirect(route('ternaks.index'));
        }

        return view('ternaks.show')->with('ternak', $ternak);
    }

    /**
     * Show the form for editing the specified Ternak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            Flash::error('Ternak not found');

            return redirect(route('ternaks.index'));
        }
        $peternak=Peternak::with('user')->get()->pluck('user.name','id');
        return view('ternaks.edit',compact('peternak'))->with('ternak', $ternak);
    }

    /**
     * Update the specified Ternak in storage.
     *
     * @param  int              $id
     * @param UpdateTernakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTernakRequest $request)
    {
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            Flash::error('Ternak not found');

            return redirect(route('ternaks.index'));
        }

        $ternak = $this->ternakRepository->update($request->all(), $id);

        Flash::success('Ternak updated successfully.');

        return redirect(route('ternaks.index'));
    }

    /**
     * Remove the specified Ternak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ternak = $this->ternakRepository->findWithoutFail($id);

        if (empty($ternak)) {
            Flash::error('Ternak not found');

            return redirect(route('ternaks.index'));
        }

        $this->ternakRepository->delete($id);

        Flash::success('Ternak deleted successfully.');

        return redirect(route('ternaks.index'));
    }
}
