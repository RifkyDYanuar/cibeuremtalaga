<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Agenda;

class HomeController extends Controller
{
    // Halaman utama root
    public function index()
    {
        // Get latest announcements for homepage
        $pengumuman = Pengumuman::active()
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
            
        // Get upcoming agenda for homepage
        $agenda = Agenda::aktif()
            ->upcoming()
            ->orderBy('tanggal_mulai', 'asc')
            ->limit(6)
            ->get();
            
        return view('welcome', compact('pengumuman', 'agenda'));
    }
    
    // Process login
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    
    // Process register
    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        
        Auth::login($user);
        return redirect()->route('user.dashboard');
    }
    
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
