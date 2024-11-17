<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $redirectTo = '/';

    /**
     * Validasi dan Registrasi Murid.
     */
    public function registerMurid(Request $request)
    {
        // Validasi data murid
        $this->validateMurid($request);

        // Buat user baru
        $murid = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($murid);

        // Redirection after registration
        return redirect('/'); // Adjust the route as needed
    }

    /**
     * Validasi dan Registrasi Guru.
     */
    public function registerGuru(Request $request)
    {
        // Validasi data guru
        $this->validateGuru($request);

        // Buat user baru dengan role guru
        $guru = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'NIP' => $request->NIP,
            'password' => Hash::make($request->password),
        ]);

        // Assign role to the user
        $guru->assignRole('Guru'); // Ensure this function exists in the User model
        Auth::login($guru);
        // Redirection after registration
        return redirect('/'); // Adjust the route as needed
    }

    /**
     * Validasi data Murid.
     */
    protected function validateMurid(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Nama Belum Di-isi',
            'name.string' => 'Nama Harus Bertipe Huruf',
            'name.max' => 'Nama Melebihi Batas',
            'email.required' => 'Email Belum Di-isi',
            'email.email' => 'Email Harus Berformat Email ( @ )',
            'email.max' => 'Email Melebihi Batas',
            'email.unique' => 'Email Sudah Digunakan',
            'password.required' => 'Password Belum Di-isi',
            'password.string' => 'Password Harus Bertipe Huruf',
            'password.min' => 'Minimal Password 8 Karakter',
            'password.confirmed' => 'Password Tidak Sama dengan Konfirmasi',
        ]);
    }

    /**
     * Validasi data Guru.
     */
    protected function validateGuru(Request $request)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'guru',
            'is_approved' => false, 
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'NIP' => ['required', 'numeric', 'digits_between:1,18', 'unique:users,NIP'],
        ], [
            'name.required' => 'Nama Belum Di-isi',
            'name.string' => 'Nama Harus Bertipe Huruf',
            'name.max' => 'Nama Melebihi Batas',
            'email.required' => 'Email Belum Di-isi',
            'email.email' => 'Email Harus Berformat Email ( @ )',
            'email.max' => 'Email Melebihi Batas',
            'email.unique' => 'Email Sudah Digunakan',
            'password.required' => 'Password Belum Di-isi',
            'password.string' => 'Password Harus Bertipe Huruf',
            'password.min' => 'Minimal Password 8 Karakter',
            'password.confirmed' => 'Password Tidak Sama dengan Konfirmasi',
            'NIP.required' => 'NIP Belum Di-isi',
            'NIP.numeric' => 'NIP harus Bertipe Angka',
            'NIP.digits_between' => 'NIP Tidak Valid (1-18 Digit)',
            'NIP.unique' => 'NIP Sudah Digunakan',
        ]);
    }

    /**
     * Handle the user after login based on role.
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return redirect('/admin');
    //     } elseif ($user->hasRole('Guru')) {
    //         return redirect('/guru');
    //     } elseif ($user->hasRole('Murid')) {
    //         return redirect('/murid');
    //     }
    //     return redirect('/');
    // }

}
