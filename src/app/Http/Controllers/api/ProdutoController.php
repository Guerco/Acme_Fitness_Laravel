<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProdutoRequest;
use App\Http\Services\ProdutoService;

class ProdutoController extends ControllerBase
{
    public function __construct ( ProdutoService $service ) {
        parent::__construct( $service );
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return parent::_index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( ProdutoRequest $request )
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
     * Update the specified resource in storage.
     */
    public function update( ProdutoRequest $request, $id )
    {
        return parent::_update( $request, $id );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        return parent::_destroy( $id );
    }
}
