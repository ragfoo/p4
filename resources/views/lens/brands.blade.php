@extends('master')


@section('title')
    Brands
@stop

@section('subtitle')
@stop


@section('content')
  <!-- Feature Row -->
  <div class="row">
    @foreach ($manufacturers as $manufacturer)
      <article class="col-md-4 article-intro">
        <a href="/lenses/{{strtolower($manufacturer->name)}}">
        <h3>
            <p align="center"> {{ $manufacturer->name }} </p>
        </h3>
        @if ($manufacturer->logo)
          <img class="img-responsive img-max" alt="W3Schools" src= {{ $manufacturer->logo }}></a>
        @else
          <img class="img-responsive img-max" alt="W3Schools" src= '/img/logos/camera-lens-icon.jpg'></a>
        @endif
      </article>
    @endforeach
  </div>
  <!-- /.row -->

</div>

@stop

@section('footer')
@if(Auth::check())
<div align="center">
@if($errors->get('brand'))
    <ul>
        @foreach($errors->get('brand') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method='POST' action='/lenses/brands'>
    {{ csrf_field() }}
    <label for="manufacturer" >Add a Brand</label>
    <input type="text" placeholder="Brand Name" name="brand">
    <input type="text" placeholder="Logo URL" name="logo_url">
    <input type="submit" value="Submit">
</form>
</div>
@endif
@stop
