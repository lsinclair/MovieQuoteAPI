<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuoteCollection;
use App\Http\Resources\QuoteResource;
use App\Models\MovieQuote;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\Quote;

class MovieQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = MovieQuote::paginate(50);
        return new QuoteCollection($quotes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_title' => 'required|string',
            'quote' => 'required|string',
            'type' => 'required|string',
            'year' => 'required',
        ]);

        return MovieQuote::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieQuote  $movieQuote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote = MovieQuote::find($id);
        return new QuoteResource($quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovieQuote  $movieQuote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quote = Quote::find($id);
        $quote->update($request->all());
        return new QuoteResource($quote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieQuote  $movieQuote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return MovieQuote::destroy($id);
    }
}
