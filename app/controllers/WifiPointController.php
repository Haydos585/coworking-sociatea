<?php

class WifiPointController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wifi_points = WifiPoint::all();
		return View::make('wifi_points.index')->with('wifi_points', $wifi_points);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$wifi_point = WifiPoint::find($id);
		$closest_venues = WifiVenue::where('wifi_point_id', $wifi_point->name)->first();
		$closest_pubs = explode("; ", $closest_venues["pubs"]);
		$closest_cafes = explode("; ", $closest_venues["cafes"]);
		$closest_restaurants = explode("; ", $closest_venues["restaurants"]);
		$closest_libraries = explode("; ", $closest_venues["libraries"]);

		$closest_venue["pubs"] = [];
		foreach ($closest_pubs as $key => $value) {
			array_push($closest_venue["pubs"], Venue::where('address', '=', $value)->first());
		}
		$closest_venue["cafes"] = [];
		foreach ($closest_cafes as $key => $value) {
			array_push($closest_venue["cafes"], Venue::where('address', '=', $value)->first());
		}
		$closest_venue["restaurants"] = [];
		foreach ($closest_restaurants as $key => $value) {
			array_push($closest_venue["restaurants"], Venue::where('address', '=', $value)->first());
		}
		$closest_venue["libraries"] = [];
		foreach ($closest_libraries as $key => $value) {
			array_push($closest_venue["libraries"], Venue::where('address', '=', $value)->first());
		}
		return View::make('wifi_points.show')->with('wifi_point', $wifi_point)
																				 ->with('closest_pubs', $closest_venue["pubs"])
																				 ->with('closest_cafes', $closest_venue["cafes"])
																				 ->with('closest_restaurants', $closest_venue["restaurants"])
																				 ->with('closest_libraries', $closest_venue["libraries"]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
