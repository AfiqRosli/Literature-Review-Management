<?php

namespace App\Http\Controllers;

use App\LiteratureReview;
use Illuminate\Http\Request;

class LiteratureReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LiteratureReview::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LiteratureReview::create($request->all());

        return 'saved!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LiteratureReview  $literatureReview
     * @return \Illuminate\Http\Response
     */
    public function show(LiteratureReview $literatureReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LiteratureReview  $literatureReview
     * @return \Illuminate\Http\Response
     */
    public function edit(LiteratureReview $literatureReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LiteratureReview  $literatureReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiteratureReview $literatureReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LiteratureReview  $literatureReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiteratureReview $literatureReview)
    {
        //
    }
}
