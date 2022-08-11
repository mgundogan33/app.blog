<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $settings = Setting::all();
        $categories = Category::all();
        $posts = Post::all();
        $emails = Newsletter::all();
        return view('dashboard.home', compact('settings', 'categories', 'posts', 'emails'));
    }
    public function allUsers()
    {
        $users = User::paginate(10);
        return view('dashboard.admin.users.all-users', compact('users'));
    }
    public function toggleStatus($id)
    {
        $user = User::find($id);

        if ($user->email =="gundogan.mehmet33@gmail.com") {
            toastr()->error('Admin Durumu Değiştirilemiyor');
            return back();
        }
        if ($user->is_admin ==1) {
            $user->is_admin =0;
            $user->save();
        } else {
            $user->is_admin =1;
            $user->save();
        }

        toastr()->success('Kullanıcı Statüsü Güncellendi !', 'Kullanıcı');
        return back();
    }
}
