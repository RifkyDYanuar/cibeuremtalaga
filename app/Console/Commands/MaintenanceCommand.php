<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MaintenanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance {action} {--reason=} {--duration=} {--ips=} {--exclude-my-ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable or disable maintenance mode';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $action = $this->argument('action');

        switch ($action) {
            case 'on':
            case 'enable':
                return $this->enableMaintenance();
            
            case 'off':
            case 'disable':
                return $this->disableMaintenance();
            
            case 'status':
                return $this->showStatus();
            
            default:
                $this->error('Invalid action. Use: on, off, or status');
                return Command::FAILURE;
        }
    }

    /**
     * Enable maintenance mode
     */
    protected function enableMaintenance()
    {
        $reason = $this->option('reason') ?? $this->ask('Alasan maintenance', 'Scheduled maintenance');
        $duration = $this->option('duration') ?? $this->ask('Estimasi durasi', '2 hours');
        
        // Handle IP configuration
        if ($this->option('exclude-my-ip')) {
            $ips = $this->ask('IP yang diizinkan (pisahkan dengan koma, kosongkan untuk tidak ada)', '');
        } else {
            $ips = $this->option('ips') ?? $this->ask('IP yang diizinkan (pisahkan dengan koma)', '127.0.0.1');
        }

        // Create maintenance flag
        Storage::put('maintenance.flag', json_encode([
            'enabled_at' => now()->toISOString(),
            'enabled_by' => 'Artisan Command',
            'reason' => $reason,
            'estimated_duration' => $duration
        ]));

        // Store allowed IPs
        if ($ips && trim($ips) !== '') {
            $allowedIPs = array_filter(array_map('trim', explode(',', $ips)));
            Storage::put('maintenance_allowed_ips.json', json_encode($allowedIPs));
        } else {
            // No allowed IPs - maintenance applies to everyone
            Storage::put('maintenance_allowed_ips.json', json_encode([]));
        }

        $this->info('✅ Maintenance mode enabled successfully!');
        $this->line("📋 Reason: {$reason}");
        $this->line("⏱️  Duration: {$duration}");
        $this->line("🌐 Allowed IPs: " . ($ips ?: 'None (all users will see maintenance page)'));
        
        if (!$ips || trim($ips) === '') {
            $this->warn('⚠️  No allowed IPs set. All users (including you) will see the maintenance page.');
            $this->line("🔗 Access maintenance page: http://127.0.0.1:8000/maintenance");
        }
        
        return Command::SUCCESS;
    }

    /**
     * Disable maintenance mode
     */
    protected function disableMaintenance()
    {
        if (!Storage::exists('maintenance.flag')) {
            $this->warn('⚠️  Maintenance mode is not currently enabled.');
            return Command::SUCCESS;
        }

        Storage::delete('maintenance.flag');
        Storage::delete('maintenance_allowed_ips.json');

        $this->info('✅ Maintenance mode disabled successfully!');
        $this->line('🌐 Website is now accessible to all users.');
        
        return Command::SUCCESS;
    }

    /**
     * Show maintenance status
     */
    protected function showStatus()
    {
        if (!Storage::exists('maintenance.flag')) {
            $this->info('✅ Maintenance mode: DISABLED');
            $this->line('🌐 Website is accessible to all users.');
            return Command::SUCCESS;
        }

        $maintenanceData = json_decode(Storage::get('maintenance.flag'), true);
        
        $this->warn('🔧 Maintenance mode: ENABLED');
        $this->line("📅 Enabled at: {$maintenanceData['enabled_at']}");
        $this->line("👤 Enabled by: {$maintenanceData['enabled_by']}");
        $this->line("📋 Reason: {$maintenanceData['reason']}");
        $this->line("⏱️  Duration: {$maintenanceData['estimated_duration']}");

        if (Storage::exists('maintenance_allowed_ips.json')) {
            $allowedIPs = json_decode(Storage::get('maintenance_allowed_ips.json'), true);
            $this->line("🌐 Allowed IPs: " . implode(', ', $allowedIPs));
        }

        return Command::SUCCESS;
    }
}
