<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['houses'] = House::orderBy('id','asc')->paginate(10);
        return view('house.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('house.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
        ]);

        $where = array('name' => $data['name']);
        $house = House::where($where)->first();
        if($house){
            return Redirect::to('houses/create')
                ->with('fail','Fail! House already exists.');
        }

        unset($data['_token']);
        unset($data['_method']);

        House::create($data);

        return Redirect::to('houses')
            ->with('success','Greate! House created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['house'] = House::findOrFail($id);
        return view('house.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['house'] = House::where($where)->first();

        return view('house.edit', $data);
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
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'potterapi_id' => 'required',
        ]);

        unset($data['_token']);
        unset($data['_method']);

        House::where('id',$id)->update($data);

        return Redirect::to('houses')
            ->with('success','Great! House updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        House::where('id',$id)->delete();
        return Redirect::to('houses')->with('success','House deleted successfully');
    }

    public function varify_house_by_potterapi_id($potterapi_id)
    {
        $json = json_decode(file_get_contents('https://www.potterapi.com/v1/houses?key='.env('POTTER_API_KEY')), true);

        $name = "";

        /* foreach ($json as $house){
            echo $house["_id"]."<br><br>";
        }
        5a05e2b252f721a3cf2ea33f  5a05da69d45bd0a11bd5e06f  5a05dc8cd45bd0a11bd5e071  5a05dc58d45bd0a11bd5e070
        */

        foreach ($json as $house){
            if($house["_id"]==$potterapi_id){
                $name = $house["name"];
            };
        }
        return $name;
    }
}
