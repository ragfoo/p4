@extends('lens.master')


@section('title')
    Add Lens
@stop



@section('content')
<form method='POST' action='/lens'>
    {{ csrf_field() }}
    <select>
      @foreach ($manufacturers as $manufacturer)
      <p>This is user {{ $manufacturer->id }}</p>
      <option value= {{ $manufacturer->id }}>{{ $manufacturer->name }}</option>
      @endforeach
    </select>
    <input type='submit' value='Submit'>
</form>
@stop
