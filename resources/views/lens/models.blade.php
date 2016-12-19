@extends('master')


@section('title')
    {{ $data['brand'] }}
@stop

@section('subtitle')
@stop



@section('content')
  <!-- Feature Row -->
  <div class="row">
  <form method='POST' action='/lenses/collection'>
    {{ csrf_field() }}
    @if(count($data['models']) > 0)
      @foreach ($data['models'] as $model)
        <article class="col-md-4 article-intro">
          <a href= "{{ $data['brand'] }}/{{strtolower($model->model.'_'.$model->focal_length.'f'.$model->max_aperture)}}">
              <h3> {{ $model->model." ".$model->focal_length."mm"." f/".$model->max_aperture }} </h3>

          @if ($model->logo_url)
            <img class="img-responsive img-max" alt="" src="{{$model->logo_url}}"></a>
          @else
            <img class="img-responsive img-max" alt="" src= '/img/logos/camera-lens-icon.jpg'></a>
          @endif
            @if(Auth::check())
              @if($model->users->contains(Auth::user()->id))
                <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Remove from Collection" src="">
              @else
                <input class="img-responsive img-max" type="image" name="model" value= {{ $model->id }} alt="Add to Collection" src="">
              @endif
            @endif
        </article>
      @endforeach
    @else
      <p> No Models Exist Yet For This Brand. Add a Lens in the Form Below. </p>
    @endif
  </form>
  </div>

  <!-- /.row -->

</div>

@stop

@section('footer')
@if(Auth::check())
<div align="center">
@if($errors->all())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method='POST' action='/edit/{{ $data['brand'] }}'>
    {{ csrf_field() }}
    <div>
    <label for="model">Add a Model</label>
    <input type="text" placeholder="Model Name" name="model">
    </div>
    <div>
    <label for="focal_length">Focal Length</label>
    <input type="text" placeholder="Focal Length" onkeypress="return isValidFloat(event)" name="focal_length">
    </div>
    <div>
    <label for="max_aperture">Aperture</label>
    <input type="text" placeholder="Max Aperture" onkeypress="return isValidFloat(event)" name="max_aperture">
    </div>
    <div>
    <label for="mount">Mount</label>
    <input type="text" placeholder="Mount" name="mount">
    </div>
    <div>
    <label for="logo_url">Logo URL</label>
    <input type="text" placeholder="Logo URL" name="logo_url">
    </div>
    <div>
    <input type="submit" value="Submit">
</form>
</div>
@endif
<script>

function isValidFloat(evt){
  return evt.charCode >= 48 && event.charCode <= 57 || (event.charCode == 46 && evt.srcElement.value.split('.').length<2);
}

</script>
@stop
