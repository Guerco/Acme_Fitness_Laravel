<?php

namespace App\Http\Controllers\api;

use App\Http\Services\VendaService;
use App\Http\Requests\VendaRequest;

class VendaController extends ControllerBase
{
    public function __construct ( VendaService $service ) {
        parent::__construct( $service );
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return parent::_index();
    }

    public function store( VendaRequest $request )
    {
        return parent::_store( $request );
    }

    /**
     * Display the specified resource.
     */
    public function show( $id )
    {
        return parent::_show( $id );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        return parent::_destroy( $id );
    }
}
