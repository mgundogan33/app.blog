<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $exists = Newsletter::where('email', $request->email)->first();
        if ($exists) {
            toastr()->warning('Email Zaten Kayıtlı !', 'Hata');
            return back();
        }
        Newsletter::create($request->all());
        toastr()->success('Başarıyla Abone Oldunuz', 'Başarılı');
        return back();
    }

    public function emails()
    {
        $emails = Newsletter::latest()->paginate(1);
        return view('dashboard.admin.newsletter.emails', compact('emails'));
    }
}
