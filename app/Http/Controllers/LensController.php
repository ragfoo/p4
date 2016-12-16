<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lens;

class LensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('lens.index');
      $lenses = Lens::all();

      # Make sure we have results before trying to print them...
      if(!$lenses->isEmpty()) {

          # Output the books
          foreach($lenses as $lens) {
              echo $lens->model.'<br>';
          }
      }
      else {
          echo 'No lenses found';
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
