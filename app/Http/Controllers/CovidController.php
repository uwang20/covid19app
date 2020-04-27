<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $covidCase = Http::get('https://api.covid19api.com/summary')
                      ->json();

      $dayOneCase = Http::get('https://api.covid19api.com/dayone/country/philippines')
                      ->json();

                      // dd(Carbon::parse($covidCase['Date'])->format('M d, Y H:i'));

      $topFiveCovidCase = collect($covidCase['Countries'])->sortByDesc('TotalConfirmed')->take(5);

                      // dd($topCovid);

      $globalCase = collect($covidCase['Global'])->merge([
            'TotalConfirmed' => number_format($covidCase['Global']['TotalConfirmed']),
            'TotalDeaths' => number_format($covidCase['Global']['TotalDeaths']),
            'TotalRecovered' => number_format($covidCase['Global']['TotalRecovered']),
            'NewConfirmed' => number_format($covidCase['Global']['NewConfirmed']),
            'NewDeaths' => number_format($covidCase['Global']['NewDeaths']),
            'NewRecovered' => number_format($covidCase['Global']['NewRecovered'])
          ]);

      $lastUpdated = Carbon::parse($covidCase['Date'])->format('M d, Y H:i');

      // dd($globalCase);

      return view('layouts.main',[
        'covidGlobalCase' => $globalCase,
        'lastUpdated' => $lastUpdated,
        'topFiveCovidCase' => $topFiveCovidCase
      ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
