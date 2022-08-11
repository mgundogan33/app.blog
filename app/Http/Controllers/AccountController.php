<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        return view('dashboard.admin.admin.account', compact('user'));
    }
    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $user_id = auth()->id();
        $user = User::find($user_id);
        $data = $request->all();
        if ($request->has('old_paswpord') && $request->has('new_password')) {
            // eski parolanın veritabanındaki parolayla eşleşip eşleşmediğini kontrol edin
            $hashedPassword = $user->password;
            if (Hash::check($request->old_password, $hashedPassword)) {
                // update edildi
                $hasPass = Hash::make($request->new_password);
                $data['password'] = $hasPass;
            } else {
                toastr()->error('Eski Şifre Hatalı');
                return back();
            }
        } else {
            toastr()->error('Eski Şifre Hatalı');
            return back();
        }
        $user->update($data);
        toastr()->success('Eski Şifreyi ve Yeni Şifreyi Girmelisiniz');
        return back();
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
