<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AuthCleanup extends BaseCommand
{
    protected $group = 'Auth';
    protected $name = 'auth:cleanup';
    protected $description = 'Clears expired password reset tokens and unactivated accounts';

    public function run(array $params)
    {
        CLI::write('Starting cleanup...', 'yellow');
        
        $db = \Config\Database::connect();
        
        // Limpiar tokens de reset expirados
        $db->table('user')
           ->where('reset_expires_at <', date('Y-m-d H:i:s'))
           ->where('reset_hash IS NOT NULL')
           ->update([
               'reset_hash' => null,
               'reset_expires_at' => null
           ]);
        
        $tokens = $db->affectedRows();
        
        // Eliminar cuentas no activadas después de 30 días
        $db->table('user')
           ->where('created_at <', date('Y-m-d H:i:s', strtotime('-30 days')))
           ->where('activation_hash IS NOT NULL')
           ->delete();
        
        $accounts = $db->affectedRows();
        
        CLI::write("Expired reset tokens cleared: {$tokens}", 'green');
        CLI::write("Unactivated accounts deleted: {$accounts}", 'green');
        CLI::write('Cleanup completed!', 'green');
    }
}