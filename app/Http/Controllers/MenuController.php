<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function viewMenuTenant()
    {
        $menu = Menu::paginate(15);

        $data = [
            "menu" => $menu,
        ];
        return view('dashboard/tenant/menu/menu-list', ["data" => $data]);
    }
    public function updateMenu(Request $request)
    {
        $request->validate([
            "name",
            "harga",
            "deskripsi",
            "kategori",
            "user_id",
        ]);

        $data = [
            "name" => $request->name,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "category_id" => $request->kategori,
        ];
        // dd($request);
        $x = Menu::where('id', $request->menu_id)->update($data);

        return redirect(route('view-menu-tenant'));
    }

    public function viewUpdateMenu(Request $request)
    {
        $menu = Menu::where('id', $request->id)->first();

        $data = [
            "menu" => $menu,
        ];

        return view('dashboard/tenant/menu/menu-update', ["data" => $data]);
    }

    public function viewCreateMenu()
    {
        return view('dashboard/tenant/menu/menu-create');
    }

    public function deleteMenu(Request $request)
    {
        // dd($request);
        $menu = Menu::where('id', $request->idHapus)->delete();
        // return view('dashboard/tenant/menu/menu-create');
        return redirect(route('view-menu-tenant'));
    }

    public function createMenu(Request $request)
    {
        $request->validate([
            "name",
            "harga",
            "deskripsi",
            "kategori",
            "user_id",
        ]);
        // dd($request);

        $data = [
            "name" => $request->name,
            "harga" => $request->harga,
            "deskripsi" => $request->deskripsi,
            "kategori" => $request->kategori,
            "category_id" => $request->kategori,
            "user_id" => $request->user_id,
        ];

        $x = Menu::create($data);
        // dd($x);

        return view('dashboard/tenant/menu/menu-add-image', ["data" => $x]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'file|image|max:4000',
        ]);
        // return response()->json(['status' => 1, 'msg' => 'Upload berhasil']);
        $dest = '/storage/menu-images'; // Destinasi tempat pengguna akan disimpan
        // $dest = 'asset/img/user-images'; // Destinasi tempat pengguna akan disimpan localhost
        $file = $request->file('file');
        $newImageName = 'UIMG' . date('YmdHis') . uniqid() . '.jpg'; // Nama baru

        $move = $file->move(public_path($dest), $newImageName);

        if (!$move) {
            return response()->json(['status' => 1, 'msg' => 'Upload Gagal']);
        } else {
            // Hapus File Gambar Lama
            $userInfo = Menu::where('id', $request->menu_id)->first();
            // return response()->json(['status' => 1, 'msg' => $request->menu_id]);
            // return response()->json(['status' => 1, 'msg' => 'Upload Gagal']);
            $userPhoto = $userInfo->gambar;
            // return response()->json(['status' => 1, 'msg' => $userPhoto]);
            if ($userPhoto != null) {
                $filePath = public_path($dest . '/' . $userPhoto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Perbarui Gambar
            Menu::where('id', $request->menu_id)->update(['gambar' => $newImageName]);
            return response()->json(['status' => 1, 'msg' => 'Upload berhasil', 'name' => $newImageName]);
        }
    }
}
