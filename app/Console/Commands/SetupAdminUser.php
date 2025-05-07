<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class SetupAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:setup {email?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up a user with full admin privileges';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?? 'admin@zplus.vn';
        
        DB::beginTransaction();
        
        try {
            // Find the user
            $user = User::where('email', $email)->first();
            
            if (!$user) {
                $this->error("User with email {$email} not found.");
                return 1;
            }
            
            // Make sure Admin role exists with capital A
            $adminRole = Role::where('name', 'Admin')->first();
            
            if (!$adminRole) {
                // Check if lowercase 'admin' role exists
                $lowerAdminRole = Role::where('name', 'admin')->first();
                
                if ($lowerAdminRole) {
                    // Update the existing admin role to use capitalized name
                    $lowerAdminRole->update(['name' => 'Admin']);
                    $adminRole = $lowerAdminRole;
                    $this->info("Updated existing 'admin' role to 'Admin'");
                } else {
                    // Create the Admin role
                    $adminRole = Role::create([
                        'name' => 'Admin',
                        'guard_name' => 'web'
                    ]);
                    $this->info("Created new 'Admin' role");
                }
            }
            
            // Get all permissions
            $allPermissions = Permission::all();
            
            // Assign all permissions to Admin role
            $adminRole->syncPermissions($allPermissions);
            $this->info("Assigned all permissions to 'Admin' role");
            
            // Assign Admin role to user
            $user->syncRoles([$adminRole->id]);
            
            // Also give direct permissions to the user (belt and suspenders approach)
            $user->syncPermissions($allPermissions);
            
            DB::commit();
            
            $this->info("User {$email} has been successfully set up with full admin privileges.");
            
            return 0;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("An error occurred: " . $e->getMessage());
            return 1;
        }
    }
}