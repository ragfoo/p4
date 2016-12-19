@extends('master')


@section('title')
    {{$model->model." ".$model->focal_length."mm f/".$model->max_aperture}}
@stop

@section('subtitle')
    {{$model->manufacturer->name}}
@stop



@section('content')
<!-- Portfolio Item Row -->
<div class="row">

    <div class="col-md-8">
        <img class="img-responsive" src="{{$model->logo_url}}" alt="">
    </div>
<form method='POST' action='/lenses/{{$model->manufacturer->name}}/{{$model->longname}}'>
      {{ method_field('PUT') }}
      {{ csrf_field() }}
    <div class="col-md-4">
        <h3>Product Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
        <h3>Specs</h3>
        <ul>
            <li>Model Name:<input type="text"  name="model" value= {{ $model->model }}></li>
            <li>Focal Length:<input type="text" size="5" maxlength="4" name="focal_length" onkeypress="return isValidFloat(event)" value= {{ $model->focal_length }}></li>
            <li>Max Aperture:<input type="text" size="5" maxlength="5" name="max_aperture" onkeypress="return isValidFloat(event)" value= {{ $model->max_aperture }}></li>
            <li>Mount:<input type="text"  name="mount" value= {{ $model->mount }}></li>
            <li>Blade Elements:<input type="text" size="5" maxlength="3" name="blades" onkeypress="return isValidFloat(event)" value= {{ $model->blades }}></li>
            <li>Weight:<input type="text" size="5" maxlength="7" name="weight" onkeypress="return isValidFloat(event)" value= {{ $model->weight }} ></li>
            <li>Logo URL:<input type="text" name="logo_url" value= {{ $model->logo_url }}></li>
        </ul>
        @if($errors->all())
            <ul  class="brand-input">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
<input type="submit" value= "Submit">
</div>
<!-- /.row -->

<!-- Related Projects Row -->
<div class="row">

</div>
</form>
@stop

@section('footer')
<script>
function isValidFloat(evt){
  return evt.charCode >= 48 && event.charCode <= 57 || (event.charCode == 46 && evt.srcElement.value.split('.').length<2);
}
</script>
@stop
