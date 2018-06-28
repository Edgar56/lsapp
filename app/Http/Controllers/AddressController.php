<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;



class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $addresses = Address::all();
        return view('dashboard')->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'deviceId' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'

        ]);
        //Create Address
        $address = new Address;
        $address->deviceId = $request->input('deviceId');
        $address->longitude = $request->input('longitude');
        $address->latitude = $request->input('latitude');
        $address->destination = $request->get('destination');
        $address->save();

        return redirect('/')->with('success', 'Address Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        // Check for correct user


        $address->delete();
        return redirect('/dashboard')->with('success', 'Address Removed');

    }


}
