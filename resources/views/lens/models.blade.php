@extends('master')


@section('title')
    {{ $data['brand'] }}
@stop



@section('content')
  <!-- Feature Row -->
  <div class="row">
  <form method='POST' action='/lenses/collection'>
    @foreach ($data['models'] as $model)
      <article class="col-md-4 article-intro">
        <a href= "{{ $data['brand'] }}/{{strtolower($model->model.'_'.$model->focal_length.'f'.$model->max_aperture)}}">
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
@if($errors->get('brand'))
    <ul  class="brand-input">
        @foreach($errors->get('brand') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method='POST' action='/store'>
    {{ csrf_field() }}
    <label for="model" class="brand-input">Add a Model</label>
    <input class="brand-input" type="text" placeholder="Model Name" name="model">
    <input class="brand-input" type="text" placeholder="Focal Length" name="focal_length">
    <input class="brand-input" type="text" placeholder="Max Aperture" name="max_aperture">
    <input class="brand-input" type="text" placeholder="Type" name="type">
    <input class="brand-input" type="text" placeholder="Mount" name="mount">
    <input class="brand-input" type="text" placeholder="Logo URL" name="logo_url">
    <input type="submit" class="brand-input" value="Cool">
</form>

@stop
