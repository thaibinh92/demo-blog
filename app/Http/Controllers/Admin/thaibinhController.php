<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\thaibinh;
use Illuminate\Http\Request;
use Session;

class thaibinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $thaibinh = thaibinh::paginate(25);

        return view('admin.thaibinh.index', compact('thaibinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.thaibinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        thaibinh::create($requestData);

        Session::flash('flash_message', 'thaibinh added!');

        return redirect('admin/thaibinh');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $thaibinh = thaibinh::findOrFail($id);

        return view('admin.thaibinh.show', compact('thaibinh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $thaibinh = thaibinh::findOrFail($id);

        return view('admin.thaibinh.edit', compact('thaibinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $thaibinh = thaibinh::findOrFail($id);
        $thaibinh->update($requestData);

        Session::flash('flash_message', 'thaibinh updated!');

        return redirect('admin/thaibinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        thaibinh::destroy($id);

        Session::flash('flash_message', 'thaibinh deleted!');

        return redirect('admin/thaibinh');
    }
}
