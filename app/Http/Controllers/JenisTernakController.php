<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisTernakRequest;
use App\Http\Requests\UpdateJenisTernakRequest;
use App\Repositories\JenisTernakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JenisTernakController extends AppBaseController
{
    /** @var  JenisTernakRepository */
    private $jenisTernakRepository;

    public function __construct(JenisTernakRepository $jenisTernakRepo)
    {
        $this->jenisTernakRepository = $jenisTernakRepo;
    }

    /**
     * Display a listing of the JenisTernak.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisTernakRepository->pushCriteria(new RequestCriteria($request));
        $jenisTernaks = $this->jenisTernakRepository->all();

        return view('jenis_ternaks.index')
            ->with('jenisTernaks', $jenisTernaks);
    }

    /**
     * Show the form for creating a new JenisTernak.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_ternaks.create');
    }

    /**
     * Store a newly created JenisTernak in storage.
     *
     * @param CreateJenisTernakRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisTernakRequest $request)
    {
        $input = $request->all();

        $jenisTernak = $this->jenisTernakRepository->create($input);

        Flash::success('Jenis Ternak saved successfully.');

        return redirect(route('jenisTernaks.index'));
    }

    /**
     * Display the specified JenisTernak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            Flash::error('Jenis Ternak not found');

            return redirect(route('jenisTernaks.index'));
        }

        return view('jenis_ternaks.show')->with('jenisTernak', $jenisTernak);
    }

    /**
     * Show the form for editing the specified JenisTernak.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            Flash::error('Jenis Ternak not found');

            return redirect(route('jenisTernaks.index'));
        }

        return view('jenis_ternaks.edit')->with('jenisTernak', $jenisTernak);
    }

    /**
     * Update the specified JenisTernak in storage.
     *
     * @param  int              $id
     * @param UpdateJenisTernakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisTernakRequest $request)
    {
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            Flash::error('Jenis Ternak not found');

            return redirect(route('jenisTernaks.index'));
        }

        $jenisTernak = $this->jenisTernakRepository->update($request->all(), $id);

        Flash::success('Jenis Ternak updated successfully.');

        return redirect(route('jenisTernaks.index'));
    }

    /**
     * Remove the specified JenisTernak from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisTernak = $this->jenisTernakRepository->findWithoutFail($id);

        if (empty($jenisTernak)) {
            Flash::error('Jenis Ternak not found');

            return redirect(route('jenisTernaks.index'));
        }

        $this->jenisTernakRepository->delete($id);

        Flash::success('Jenis Ternak deleted successfully.');

        return redirect(route('jenisTernaks.index'));
    }
}
