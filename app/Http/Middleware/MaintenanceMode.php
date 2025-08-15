<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if maintenance mode is enabled
        if ($this->isMaintenanceEnabled()) {
            // Allow access for specific IPs (admin IPs) - but not for preview
            $allowedIPs = $this->getAllowedIPs();
            $currentIP = $request->ip();
            
            // Force show maintenance for preview route
            if ($request->is('maintenance-preview')) {
                return redirect('/maintenance');
            }
            
            if (!in_array($currentIP, $allowedIPs)) {
                // Check if request is for maintenance page itself or assets
                if (!$request->is('maintenance') && 
                    !$request->is('maintenance-status') && 
                    !$request->is('maintenance-preview') &&
                    !$request->is('favicon.ico') &&
                    !str_starts_with($request->path(), 'css/') &&
                    !str_starts_with($request->path(), 'js/') &&
                    !str_starts_with($request->path(), 'images/')) {
                    
                    return redirect('/maintenance');
                }
            } else {
                // For allowed IPs, add a banner notification that maintenance is active
                if (!$request->is('maintenance') && 
                    !$request->is('maintenance-status') && 
                    !$request->is('maintenance-preview') &&
                    !$request->is('admin/maintenance*')) {
                    
                    // Add maintenance notice to session for allowed IPs
                    session()->flash('maintenance_notice', 'Website sedang dalam mode maintenance. Anda dapat mengakses karena IP Anda diizinkan.');
                }
            }
        }

        return $next($request);
    }

    /**
     * Check if maintenance mode is enabled
     */
    private function isMaintenanceEnabled(): bool
    {
        // Check from storage file
        return Storage::exists('maintenance.flag');
    }

    /**
     * Get list of allowed IPs during maintenance
     */
    private function getAllowedIPs(): array
    {
        $defaultIPs = [
            '127.0.0.1',
            '::1',
            '192.168.1.1', // Add your local network IP
        ];

        // Get from storage if exists
        if (Storage::exists('maintenance_allowed_ips.json')) {
            $storedIPs = json_decode(Storage::get('maintenance_allowed_ips.json'), true);
            if (is_array($storedIPs)) {
                return array_merge($defaultIPs, $storedIPs);
            }
        }

        return $defaultIPs;
    }
}
