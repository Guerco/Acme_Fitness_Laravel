<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\VariacaoRequest;
use App\Http\Services\VariacaoService;
use App\Models\Variacao;
use Illuminate\Http\Request;

class VariacaoController extends ControllerBase
{
    public function __construct ( VariacaoService $service ) {
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
    public function store( VariacaoRequest $request )
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
    public function update( VariacaoRequest $request, $id )
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
