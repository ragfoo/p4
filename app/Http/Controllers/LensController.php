<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lens;
use App\Manufacturer;
use Session;

class LensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      return view('lens.collection')->with('user', $request->user());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $manufacturers = Manufacturer::all();


      return view('lens.create')->with('manufacturers', $manufacturers);;
      $lens = new Lens();

      # Set the parameters
      # Note how each parameter corresponds to a field in the table
      $lens->model = 'Nokton';
      $lens->manufacturer = 'Voigtlander';
      $lens->type = 'Fixed';
      $lens->mount = 'Micro Four Thirds';
      $lens->max_aperture = .95;
      $lens->focal_length = 10.5;

      # Invoke the Eloquent save() method
      # This will generate a new row in the `books` table, with the above data
      $lens->save();

      echo 'Added: '.$lens->model;
  }

  public function brands(Request $request)
  {

    if ($request->isMethod('post')) {
      # Validate the request data
      $this->validate($request, [
          'brand' => 'required|min:1|unique:manufacturers,name',
      ]);
      $manufacturer = new Manufacturer();
      $manufacturer->name = $request->input("brand");
      $logo_url = $request->input("logo_url");
      $manufacturer->logo = $request->input("logo_url");
      $manufacturer->save();
    }

    $manufacturers = Manufacturer::all();
    return view('lens.brands')->with('manufacturers', $manufacturers);
  }

  public function models($brand)
  {
    $brand_id = Manufacturer::where('name','=',$brand)->pluck('id')->first();
    $models = Lens::where("manufacturer_id","=",$brand_id)->get();

    $data = array(
    'models'  => $models,
    'brand'   => $brand,
    );

    return view('lens.models')->with('data', $data);
  }

  public function details($brand, $longname)
  {
    $model = Lens::where("longname","=",$longname)->first();
    return view('lens.show')->with('model', $model);
  }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$brand)
    {
      $this->validate($request, [
          'model' => 'required|min:1|string',
          'focal_length' => 'required|min:1|numeric',
          'max_aperture' => 'required|min:0|numeric',
          'mount' => 'required|string',
          'logo_url' => 'min:1|string',
      ]);
      $manufacturer_id = Manufacturer::where('name','=',$brand)->pluck('id')->first();
      $model = new Lens();
      $model->model = $request->input('model');
      $model->manufacturer_id = $manufacturer_id;
      $model->focal_length = $request->input('focal_length');
      $model->max_aperture = $request->input('max_aperture');
      $model->mount = $request->input('mount');
      $model->logo_url = $request->input('logo_url');
      $model->longname = $model->model."_".$model->focal_length."f".$model->max_aperture;
      $model->save();
      return redirect('lenses/'.$brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatecollection(Request $request)
    {
        $lens_id = $request->input('model');
        $lens = Lens::where('id','=',$lens_id)->first();
        if ($request->user()->lenses->contains($lens_id)){
          $request->user()->lenses()->detach($lens_id);
        }else{
          $request->user()->lenses()->save($lens);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //
        return view('lens.show')->with('title', $title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($brand, $longname)
     {
       $model = Lens::where("longname","=",$longname)->first();
       return view('lens.edit')->with('model', $model);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand,$longname)
    {
        $this->validate($request, [
            'model' => 'required|min:1|string',
            'focal_length' => 'required|min:1|numeric',
            'blades' => 'min:0|integer',
            'weight' => 'min:0|numeric',
            'max_aperture' => 'required|min:0|numeric',
            'mount' => 'required|string',
            'logo_url' => 'required|min:1|string',
        ]);
        $model = Lens::where("longname","=",$longname)->first();
        $model->model = $request->input('model');
        $model->focal_length = $request->input('focal_length');
        $model->blades = intval($request->input('blades'));
        $model->max_aperture = $request->input('max_aperture');
        $model->weight = floatval($request->input('weight'));
        $model->mount = $request->input('mount');
        $model->logo_url = $request->input('logo_url');
        $model->longname = $model->model."_".$model->focal_length."f".$model->max_aperture;
        $model->save();
        return redirect('lenses/'.$brand.'/'.$model->longname);
        return view('lens.show')->with('model', $model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $brand,$longname)
    {
        $lens_id = $request->input('model');
        $lens = Lens::where('id','=',$lens_id)->first();
        if (count($lens->users) > 0) {
          Session::flash('flash_message','Lens Can not be deleted because it is in a collection.');
          return back();
        }else{
          $lens->delete();
        }
        return redirect('lenses/'.$brand);
    }
}
