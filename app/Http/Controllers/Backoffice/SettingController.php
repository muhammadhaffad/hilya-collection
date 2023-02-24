<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function settingView() {
        $contact = Contact::first();
        return view('web.backoffice.pages.settings.layout', ['contact' => $contact]);
    }


    public function updateContact(Request $request) {
        $request->validate([
            'alamat' => ['required'],
            'telp' => ['required'],
            'map' => ['required']
        ]);

        $contact = Contact::first();
        $contact->alamat = $request->alamat;
        $contact->telp = $request->telp;
        $contact->map = $request->map;
        $contact->save();
        return back()->with('success-contact', 'Kontak berhasil diperbarui!');
    }

    public function updateUsername(Request $request) {
        
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Hash::check(request('password'), auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->username = $request->username;
            $user->save(); 
            return back()->with('success', 'Username berhasil diubah!');
        }

        return back()->with('fail', 'Password Salah!');
    }

    public function updatePassword(Request $request) {
        
        $request->validate([
            'new-password' => ['required'],
            'old-password' => ['required'],
        ]);

        if (Hash::check(request('old-password'), auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make(request('new-password'));
            $user->save(); 
            return back()->with('success-password', 'Password berhasil diubah!');
        }

        return back()->with('fail-password', 'Password Salah!');
    }
}
