<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\DB;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $addresses = Address::orderBy('deviceId','asc')->paginate(4);


        // Default view coordinates
        Mapper::map(54.674724, 25.267224,
            ['zoom'=>16]);


        foreach ($addresses as $key => $m)
        {

            Mapper::marker($m->longitude, $m->latitude, ['id' => $key]);
            //Mapper::map($m->longitude, $m->latitude,['zoom'=>15]);
        }

        return view('dashboard')
            ->with('addresses', $addresses);

    }

}
