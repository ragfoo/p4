@extends('master')


@section('title')
    {{$model->model." ".$model->focal_length."mm f/".$model->max_aperture}}
@stop

@section('subtitle')
    <a href="/lenses/{{$model->manufacturer->name}}"> {{$model->manufacturer->name}} </a>
@stop



@section('content')
<!-- Portfolio Item Row -->
<div class="row">

    <div class="col-md-8">
        <img class="img-responsive" src="{{$model->logo_url}}" alt="">
    </div>

    <div class="col-md-4">
        <h3>Product Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
        <h3>Specs</h3>
        <ul>
            <li>Focal Length:{{$model->focal_length}}</li>
            <li>Max Aperture:{{$model->max_aperture}}</li>
            <li>Mount:{{$model->mount}}</li>
            <li>Blade Elements:{{ $model->blades }}</li>
            <li>Weight:{{ $model->weight }}</li>
        </ul>
    </div>

</div>
<!-- /.row -->

<!-- Related Projects Row -->
<div class="row">
@if(Auth::check())
  <form method='POST' action='/lenses/collection'>
    {{ csrf_field() }}

    @if($model->users->contains(Auth::user()->id))
      <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Remove from Collection" src="">
    @else
      <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Add to Collection" src="">
    @endif
</form>
<form method='POST' action='/edit/{{$model->manufacturer->name}}/{{$model->longname}}'>
  {{ csrf_field() }}
    <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Edit" src="">
@endif
</form>
</div>
@stop
