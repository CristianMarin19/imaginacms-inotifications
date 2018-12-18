<?php

namespace Modules\Inotification\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inotification\Entities\Platform;
use Modules\Inotification\Http\Requests\CreatePlatformRequest;
use Modules\Inotification\Http\Requests\UpdatePlatformRequest;
use Modules\Inotification\Repositories\PlatformRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PlatformController extends AdminBaseController
{
    /**
     * @var PlatformRepository
     */
    private $platform;

    public function __construct(PlatformRepository $platform)
    {
        parent::__construct();

        $this->platform = $platform;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$platforms = $this->platform->all();

        return view('inotification::admin.platforms.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inotification::admin.platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePlatformRequest $request
     * @return Response
     */
    public function store(CreatePlatformRequest $request)
    {
        $this->platform->create($request->all());

        return redirect()->route('admin.inotification.platform.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inotification::platforms.title.platforms')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Platform $platform
     * @return Response
     */
    public function edit(Platform $platform)
    {
        return view('inotification::admin.platforms.edit', compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Platform $platform
     * @param  UpdatePlatformRequest $request
     * @return Response
     */
    public function update(Platform $platform, UpdatePlatformRequest $request)
    {
        $this->platform->update($platform, $request->all());

        return redirect()->route('admin.inotification.platform.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inotification::platforms.title.platforms')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Platform $platform
     * @return Response
     */
    public function destroy(Platform $platform)
    {
        $this->platform->destroy($platform);

        return redirect()->route('admin.inotification.platform.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inotification::platforms.title.platforms')]));
    }
}