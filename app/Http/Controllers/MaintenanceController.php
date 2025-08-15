<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /**
     * Show maintenance page
     */
    public function show()
    {
        return view('maintenance');
    }

    /**
     * Force show maintenance page for preview (even for allowed IPs)
     */
    public function preview()
    {
        return view('maintenance');
    }

    /**
     * Check maintenance status (for AJAX)
     */
    public function status()
    {
        $isMaintenanceMode = Storage::exists('maintenance.flag');
        
        return response()->json([
            'maintenance' => $isMaintenanceMode,
            'message' => $isMaintenanceMode ? 'Website sedang dalam mode maintenance' : 'Website normal'
        ]);
    }

    /**
     * Enable maintenance mode
     */
    public function enable(Request $request)
    {
        // Create maintenance flag file
        Storage::put('maintenance.flag', json_encode([
            'enabled_at' => now()->toISOString(),
            'enabled_by' => Auth::check() ? Auth::user()->name : 'System',
            'reason' => $request->get('reason', 'Scheduled maintenance'),
            'estimated_duration' => $request->get('duration', '2 hours')
        ]));

        // Store allowed IPs if provided
        if ($request->has('allowed_ips')) {
            $allowedIPs = array_filter(array_map('trim', explode(',', $request->get('allowed_ips'))));
            Storage::put('maintenance_allowed_ips.json', json_encode($allowedIPs));
        }

        return response()->json([
            'success' => true,
            'message' => 'Maintenance mode enabled successfully'
        ]);
    }

    /**
     * Disable maintenance mode
     */
    public function disable()
    {
        // Remove maintenance flag file
        if (Storage::exists('maintenance.flag')) {
            Storage::delete('maintenance.flag');
        }

        // Remove allowed IPs file
        if (Storage::exists('maintenance_allowed_ips.json')) {
            Storage::delete('maintenance_allowed_ips.json');
        }

        return response()->json([
            'success' => true,
            'message' => 'Maintenance mode disabled successfully'
        ]);
    }

    /**
     * Get maintenance info
     */
    public function info()
    {
        if (!Storage::exists('maintenance.flag')) {
            return response()->json([
                'maintenance' => false,
                'message' => 'Maintenance mode is not active'
            ]);
        }

        $maintenanceData = json_decode(Storage::get('maintenance.flag'), true);
        
        return response()->json([
            'maintenance' => true,
            'data' => $maintenanceData
        ]);
    }
}
