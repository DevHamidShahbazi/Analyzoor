<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuAdminRequest;
use App\Http\Traits\admin\MenuTrait;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use MenuTrait;
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menu.index',compact('menus'));
    }
    public function store(MenuAdminRequest $request)
    {
        Menu::create($this->ArrayData($request));
        return redirect(route('admin.menu.index'))->with('success', 'اضافه شد');
    }
    public function update(MenuAdminRequest $request, Menu $menu)
    {
        $menu->update($this->ArrayData($request));
        return redirect(route('admin.menu.index'))->with('success', 'تغییرات اعمال شد');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(['success' => true, 'id' => $menu['id']]);
    }
}
