<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MaintenanceManagementController extends Controller
{
    protected $configFile = 'maintenance/config.json';
    protected $ipFile = 'maintenance/whitelist.json';
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Pastikan hanya admin yang bisa akses
    }
    
    public function index()
    {
        return view('admin.maintenance.manage');
    }
    
    public function enable(Request $request)
    {
        try {
            $config = [
                'enabled' => true,
                'enabled_at' => now()->toISOString(),
                'duration' => $request->input('duration'),
                'reason' => $request->input('reason'),
                'enabled_by' => Auth::user()->name ?? 'System'
            ];
            
            Storage::put($this->configFile, json_encode($config, JSON_PRETTY_PRINT));
            
            // Also run artisan command for backup
            Artisan::call('maintenance:on');
            
            return response()->json([
                'success' => true,
                'message' => 'Maintenance mode enabled successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to enable maintenance mode: ' . $e->getMessage()
            ]);
        }
    }
    
    public function disable()
    {
        try {
            $config = [
                'enabled' => false,
                'disabled_at' => now()->toISOString(),
                'disabled_by' => Auth::user()->name ?? 'System'
            ];
            
            Storage::put($this->configFile, json_encode($config, JSON_PRETTY_PRINT));
            
            // Also run artisan command for backup
            Artisan::call('maintenance:off');
            
            return response()->json([
                'success' => true,
                'message' => 'Maintenance mode disabled successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to disable maintenance mode: ' . $e->getMessage()
            ]);
        }
    }
    
    public function addIP(Request $request)
    {
        $request->validate([
            'ip' => 'required|ip'
        ]);
        
        try {
            $ips = $this->getWhitelistedIPs();
            $newIP = $request->input('ip');
            
            if (!in_array($newIP, $ips)) {
                $ips[] = $newIP;
                Storage::put($this->ipFile, json_encode($ips, JSON_PRETTY_PRINT));
            }
            
            return response()->json([
                'success' => true,
                'message' => 'IP added to whitelist'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add IP: ' . $e->getMessage()
            ]);
        }
    }
    
    public function removeIP(Request $request)
    {
        $request->validate([
            'ip' => 'required|ip'
        ]);
        
        try {
            $ips = $this->getWhitelistedIPs();
            $removeIP = $request->input('ip');
            
            $ips = array_values(array_filter($ips, function($ip) use ($removeIP) {
                return $ip !== $removeIP;
            }));
            
            Storage::put($this->ipFile, json_encode($ips, JSON_PRETTY_PRINT));
            
            return response()->json([
                'success' => true,
                'message' => 'IP removed from whitelist'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove IP: ' . $e->getMessage()
            ]);
        }
    }
    
    public function listIPs()
    {
        try {
            $ips = $this->getWhitelistedIPs();
            
            return response()->json([
                'success' => true,
                'ips' => $ips
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to load IP list: ' . $e->getMessage(),
                'ips' => []
            ]);
        }
    }
    
    public function getCurrentIP(Request $request)
    {
        return response()->json([
            'ip' => $request->ip()
        ]);
    }
    
    protected function getWhitelistedIPs()
    {
        if (Storage::exists($this->ipFile)) {
            $content = Storage::get($this->ipFile);
            $ips = json_decode($content, true);
            return is_array($ips) ? $ips : [];
        }
        
        return [];
    }
}
