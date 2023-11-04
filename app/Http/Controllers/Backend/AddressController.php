<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Division;
use App\Models\PostOffice;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function showDivision()
    {
        $divisions = Division::all();
        return view('admin.address.division.division_view', compact('divisions'));
    }
    public function storeDivision(Request $request)
    {
        if (isset($request->id)) {
            $request->validate(
                [
                    'division_name' => 'required|unique:divisions,division_name,' . $request->id,
                    'division_name_bn' => 'required|unique:divisions,division_name_bn,' . $request->id,
                ],
                [
                    'division_name.required' => 'Input Division Name in English',
                    'division_name_bn.required' => 'Input Division Name in Bangla',
                    'division_name.unique' => 'Inputed Division Name Already Exists',
                    'division_name_bn.unique' => 'Inputed Division Name Already Exists',
                ]
            );
        } else {
            $request->validate(
                [
                    'division_name' => 'required|unique:divisions,division_name',
                    'division_name_bn' => 'required|unique:divisions,division_name_bn',
                ],
                [
                    'division_name.required' => 'Input Division Name in English',
                    'division_name_bn.required' => 'Input Division Name in Bangla',
                    'division_name.unique' => 'Inputed Division Name Already Exists',
                    'division_name_bn.unique' => 'Inputed Division Name Already Exists',
                ]
            );
        }

        if (isset($request->id)) {
            $id = $request->id;
            $division =  Division::find($id);
        } else {
            $division = new Division;
        }
        // $brand = new Brand();
        $division->division_name = $request->division_name;
        $division->division_name_bn = $request->division_name_bn;


        $division->save();
        $notification = array(
            'message' => 'Division Added/Updated Successfully',
            'alert-type' => 'success'
        );
        //return $request->all();
        return redirect('admin/address/division')->with($notification);
    }

    public function deleteDivision($id)
    {
        $division = Division::find($id);
        $division->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editDivision($id)
    {
        $divisions = Division::all();
        $division_edit = Division::find($id);
        return view('admin.address.division.division_view', compact('division_edit', 'divisions'));
    }

    ////////////////////////Cities

    public function showCity()
    {
        $cities = City::with('division')->get();
        $divisions = Division::all();
        return view('admin.address.cities.cities_view', compact('cities', 'divisions'));
    }
    public function storeCity(Request $request)
    {
        if (isset($request->id)) {
            $request->validate(
                [
                    'division_id' => 'required',
                    'city_name' => 'required|unique:cities,city_name,' . $request->id,
                    'city_name_bn' => 'required|unique:cities,city_name,' . $request->id,
                ],
                [
                    'division_id.required' => 'Input Division Name',
                    'city_name.required' => 'Input City Name in English',
                    'city_name_bn.required' => 'Input City Name in Bangla',
                    'city_name.unique' => 'Inputed City Name Already Exists',
                    'city_name_bn.unique' => 'Inputed City Name Already Exists',
                ]
            );
        } else {
            $request->validate(
                [
                    'division_id' => 'required',
                    'city_name' => 'required|unique:cities,city_name',
                    'city_name_bn' => 'required|unique:cities,city_name',
                ],
                [
                    'division_id.required' => 'Input Division Name',
                    'city_name.required' => 'Input City Name in English',
                    'city_name_bn.required' => 'Input City Name in Bangla',
                    'city_name.unique' => 'Inputed City Name Already Exists',
                    'city_name_bn.unique' => 'Inputed City Name Already Exists',
                ]
            );
        }

        if (isset($request->id)) {
            $id = $request->id;
            $city =  City::find($id);
        } else {
            $city = new City;
        }
        // $brand = new Brand();
        $city->division_id = $request->division_id;
        $city->city_name = $request->city_name;
        $city->city_name_bn = $request->city_name_bn;


        $city->save();
        $notification = array(
            'message' => 'City Added/Updated Successfully',
            'alert-type' => 'success'
        );
        //return $request->all();
        return redirect('admin/address/cities')->with($notification);
    }

    public function deleteCity($id)
    {
        $city = City::find($id);
        $city->delete();
        $notification = array(
            'message' => 'City Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editCity($id)
    {
        $cities = City::with('division')->get();
        $city_edit = City::with('division')->where('id', $id)->first();
        $divisions = Division::all();
        //return $city_edit;
        return view('admin.address.cities.cities_view', compact('city_edit', 'cities', 'divisions'));
    }


    ///////////////////////////Post Office

    public function showArea()
    {
        $offices = PostOffice::with('division', 'city')->get();
        $cities = City::all();
        $divisions = Division::all();
        return view('admin.address.post_office.post_office_view', compact('cities', 'divisions','offices'));
    }
    public function storeArea(Request $request)
    {
            $request->validate(
                [
                    'division_id' => 'required',
                    'city_id' => 'required',
                    'post_office_name' => 'required',
                    'post_office_name_bn' => 'required',
                ],
                [
                    'division_id.required' => 'Input Division Name',
                    'city_id.required' => 'Input City Name',
                    'post_office_name.required' => 'Input Post Office in English',
                    'post_office_name_bn.required' => 'Input Post Office in Bangla',
                ]
            );

        if (isset($request->id)) {
            $id = $request->id;
            $area =  PostOffice::find($id);
        } else {
            $area = new PostOffice;
        }
        // $brand = new Brand();
        $area->division_id = $request->division_id;
        $area->city_id = $request->city_id;
        $area->post_office_name = $request->post_office_name;
        $area->post_office_name_bn = $request->post_office_name_bn;


        $area->save();
        $notification = array(
            'message' => 'Area Added/Updated Successfully',
            'alert-type' => 'success'
        );
        //return $request->all();
        return redirect('admin/address/area')->with($notification);
    }

    public function deleteArea($id)
    {
        $area = PostOffice::find($id);
        $area->delete();
        $notification = array(
            'message' => 'Area Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editArea($id)
    {
        $offices = PostOffice::with('division', 'city')->get();
        $cities = City::all();
        $office_edit = PostOffice::with('division', 'city')->where('id', $id)->first();
        $divisions = Division::all();
        //return $city_edit;
        return view('admin.address.post_office.post_office_view', compact('office_edit', 'cities', 'divisions', 'offices'));
    }
    public function getCity($id){
        $cities = City::where('division_id',$id)->get();
        $office_edit = PostOffice::where('division_id', $id)->first();
        return response()->json(['cities'=>$cities, 'office_edit'=>$office_edit]);

    }

}
