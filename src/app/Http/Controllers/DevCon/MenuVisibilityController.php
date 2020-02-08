<?php

namespace Anam\Dashboard\app\Http\Controllers\DevCon;

use Anam\Dashboard\Models\Menu;
use Anam\Dashboard\Models\Priority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuVisibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard::devMenuVisibility.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard::userPriorityLevel.getAppModuleView', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'menu_id' => 'required',
        ), array(
            'menu_id.required' => 'Please select at least one Menu'
        ));

        $unset_all_visibility = Menu::query()->update(['sidebar_visibility' => 0]);
        if ($unset_all_visibility) {
            $updated = Menu::whereIn('id', $request->menu_id)->update(['sidebar_visibility' => 1]);
            if ($updated) {
                session()->flash('success', 'Menu Visibility Set Successfully');
            } else {
                session()->flash('error', 'Something Went Wrong!');
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
