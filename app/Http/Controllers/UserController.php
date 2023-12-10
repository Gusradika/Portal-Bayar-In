<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function viewUserList()
    {

        $user = User::where('roles_id', 3)->paginate(15);

        $data = [
            'list' => $user,
        ];

        return view('dashboard/admin/user-list/viewUserList', ['data' => $data]);
    }
    public function addBalance(Request $request)
    {
        if (Auth()->user()->id == 1) {
            $user = User::where('id', $request->id)->first();
            $currentBalance = $user->balance;

            $initialBalance = $currentBalance + $request->amount;
            $query = [
                "balance" => $initialBalance
            ];
            $user->update($query);

            return redirect()->back()->with("success", "Berhasil menambahkan saldo");
        } else {
            abort(404);
        }
    }
    public function searchUserEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return view('dashboard/admin/user-list/detailUserTopUp', ['user' => $user])->render();
        } else {
            return response()->json(['status' => 0]);
        }
        // return response()->json(["msg", "abc"]);
    }
    public function saveImage(Request $request)
    {
        $request->validate([
            'file' => 'file|image|max:4000',
        ]);

        $dest = '/storage/user-images'; // Destinasi tempat pengguna akan disimpan
        // $dest = 'asset/img/user-images'; // Destinasi tempat pengguna akan disimpan localhost
        $file = $request->file('file');
        $newImageName = 'UIMG' . date('YmdHis') . uniqid() . '.jpg'; // Nama baru

        $move = $file->move(public_path($dest), $newImageName);

        if (!$move) {
            return response()->json(['status' => 1, 'msg' => 'Upload Gagal']);
        } else {
            // Hapus File Gambar Lama
            $userInfo = User::where('id', $request->id)->first();
            $userPhoto = $userInfo->gambar;
            // return response()->json(['status' => 1, 'msg' => $userPhoto]);
            if ($userPhoto != null) {
                $filePath = public_path($dest . '/' . $userPhoto);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            // Perbarui Gambar
            User::where('id', $request->id)->update(['gambar' => $newImageName]);

            return response()->json(['status' => 1, 'msg' => 'Upload berhasil', 'name' => $newImageName]);
        }
    }
    public function deleteUser(Request $request)
    {
        // dd($request);
        User::where('id', $request->idHapus)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function viewUserDetail(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        // return response()->json(["msg", "abc"]);
        return view('dashboard/admin/user-list/detailUser', ['user' => $user])->render();
    }

    public function viewUpdateUser(User $user)
    {
        return view('dashboard/admin/user-list/updateUser', ['user' => $user]);
    }
    public function viewTopUp()
    {
        return view('dashboard/admin/user-list/topUp');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            "id" => "required",
            "name" => "required",
            "email" => "required",
            "no_telp" => "required",
        ]);
        $data = $request->all();
        $query = [
            "name" => $data['name'],
            "email" => $data['email'],
            "no_telp" => $data['no_telp'],
        ];
        User::where('id', $request->id)->update($query);
        return redirect(route('view-user-list'))->with('success', "User Berhasil di update");
        // dd($data);
    }
}
