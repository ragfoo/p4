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
    {{ csrf_field() }}
    @foreach ($user->lenses as $model)
      <article class="col-md-4 article-intro">
        <a href= "lenses/{{ $model->manufacturer->name }}/{{strtolower($model->model.'_'.$model->focal_length.'f'.$model->max_aperture)}}">
            <h3> {{ $model->model." ".$model->focal_length."mm"." f/".$model->max_aperture }} </h3>

        @if ($model->logo_url)
          <img class="img-responsive img-max" alt="" src="{{$model->logo_url}}"></a>
        @else
          <img class="img-responsive img-max" alt="" src= '/img/logos/camera-lens-icon.jpg'></a>
        @endif
          <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Remove from Collection" src="">
      </article>
    @endforeach
  </form>
  </div>

  <!-- /.row -->

</div>

@stop

@section('footer')
@stop
