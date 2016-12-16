@extends('lens.master')


@section('title')
    Add Lens
@stop



@section('content')
  <!-- Feature Row -->
  <div class="row">
    <form method='POST' action='/lenses/'>
        {{ csrf_field() }}
    @foreach ($manufacturers as $manufacturer)

      <article class="col-md-4 article-intro">
        <h3>
            <p align="center"> {{ $manufacturer->name }} </p>
        </h3>
          <input class="img-responsive img-max" type="image" name= {{ $manufacturer->name }} value= {{ $manufacturer->id }} alt="blue" src= {{ $manufacturer->logo }}>
      </article>
    @endforeach
    </form>
  </div>
  <!-- /.row -->

</div>
@stop
