@extends('layouts.app')
@section('content')
    <h1>Create Address</h1>
    {!! Form::open(['action'=>'AddressController@store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('deviceId','Device Id')}}
        {{Form::text('deviceId','',['class' => 'form-control','placeholder'=>'Device Id '])}}
    </div>
    <div class="form-group">
        {{Form::label('longitude', 'Longitude')}}
        {{Form::text('longitude','',['class' => 'form-control','placeholder'=>'Longitude'])}}
    </div>
    <div class="form-group">
        {{Form::label('latitude', 'Latitude')}}
        {{Form::text('latitude','',['class' => 'form-control','placeholder'=>'Latitude', 'step'=>'any'])}}
    </div>
    <div class="form-group">
        {{Form::label('destination', 'Destination')}}
        {{Form::select('destination', ['Home' => 'Home', 'Work' => 'Work'], 'Home')}}
    </div>
    {{Form::submit('Send',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

