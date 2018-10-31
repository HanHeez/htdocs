<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HocSinh;

class HocSinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hocsinh = HocSinh::all();
        return view('restful.list', compact('hocsinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restful.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $hocsinh = new HocSinh;
        $hocsinh->hoten = $request->txtHoTen;
        $hocsinh->toan = $request->txtToan;
        $hocsinh->ly = $request->txtLy;
        $hocsinh->hoa = $request->txtHoa;
        $hocsinh->save();
        return redirect()->route('hocsinh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 1234;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = HocSinh::find($id);
        return view('restful.edit', compact('data'));
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
       
        $hocsinh = HocSinh::find($id)
        // cach 1
        ->update([
            'hoten' => $request->txtHoTen,
            'toan' => $request->txtToan,
            'ly' => $request->txtLy,
            'hoa' => $request->txtHoa,
        ]);
        //cach 2
        // $hocsinh->hoten = $request->txtHoTen;
        // $hocsinh->toan = $request->txtToan;
        // $hocsinh->ly = $request->txtLy;
        // $hocsinh->hoa = $request->txtHoa;
        // $hocsinh->save();
        return redirect()->route('hocsinh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hocsinh = HocSinh::findOrFail($id);
        $hocsinh->delete();
        return redirect()->route('hocsinh.index');
    }
}


