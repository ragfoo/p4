@extends('master')


@section('title')
    {{$user->name}}
@stop
@section('subtitle')
    lens collection
@stop



@section('content')
  <!-- Feature Row -->
  <div class="row">
  <form method='POST' action='/lenses/collection'>
    @foreach ($user->lenses as $model)
      <article class="col-md-4 article-intro">
        <a href= "lenses/{{ $model->manufacturer->name }}/{{strtolower($model->model.'_'.$model->focal_length.'f'.$model->max_aperture)}}">
        <h3>
            <p align="center"> {{ $model->model." ".$model->focal_length."mm"." f/".$model->max_aperture }} </p>
        </h3>
          <img class="img-responsive img-max" alt="W3Schools" src= '/img/logos/camera-lens-icon.jpg'></a>
          <input class="img-responsive img-max" type="image" name="thing" value="thing" alt="thing" src="">
      </article>
    @endforeach
  </form>
  </div>

  <!-- /.row -->

</div>

@stop

@section('footer')
@stop
