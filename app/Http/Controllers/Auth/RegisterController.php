<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showIndividualForm()
    {
        return view('auth.register-individual');
    }

    public function showCompanyForm()
    {
        return view('auth.register-company');
    }

    public function registerIndividual(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Password::defaults()],
            'gdpr' => 'accepted',
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'client_type' => 'individual',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        // dd('registered!');
        // return redirect('/dashboard');
        return back()->with('show_success_modal', true);
    }

    public function registerCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_reg_no' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Password::defaults()],
            'gdpr' => 'accepted',
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'client_type' => 'company',
            'company_name' => $request->company_name,
            'company_reg_no' => $request->company_reg_no,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }
}
