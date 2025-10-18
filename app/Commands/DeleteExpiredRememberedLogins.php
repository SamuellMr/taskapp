<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DeleteExpiredRememberedLogins extends BaseCommand
{
    protected $group = 'Auth';
    protected $name = 'auth:cleanup';
    protected $description = 'Clears ALL expired authentication data.';

    public function run(array $params)
    {
        CLI::write('Starting authentication cleanup...', 'yellow');
        CLI::newLine();
        
        $db = \Config\Database::connect();
        
        // 1. Limpiar remembered logins expirados
        CLI::write('Cleaning expired remembered logins...', 'cyan');
        $builder = $db->table('remembered_login');
        $builder->where('expires_at <', date('Y-m-d H:i:s'));
        $builder->delete();
        
        $rememberedLogins = $db->affectedRows();
        CLI::write("Expired remembered logins deleted: {$rememberedLogins}", 'green');
        CLI::newLine();
        
        // 2. Limpiar tokens de reset de contraseña expirados
        CLI::write('Cleaning expired password reset tokens...', 'cyan');
        $builder = $db->table('user');
        $builder->where('reset_expires_at <', date('Y-m-d H:i:s'));
        $builder->where('reset_hash IS NOT NULL');
        $builder->update([
            'reset_hash' => null,
            'reset_expires_at' => null
        ]);
        
        $resetTokens = $db->affectedRows();
        CLI::write("Expired reset tokens cleared: {$resetTokens}", 'green');
        CLI::newLine();
        
        // 3. Eliminar cuentas no activadas después de 30 días
        CLI::write('Deleting unactivated accounts (older than 30 days)...', 'cyan');
        $builder = $db->table('user');
        $builder->where('created_at <', date('Y-m-d H:i:s', strtotime('-30 days')));
        $builder->where('activation_hash IS NOT NULL');
        $builder->delete();
        
        $unactivatedAccounts = $db->affectedRows();
        CLI::write("Unactivated accounts deleted: {$unactivatedAccounts}", 'green');
        CLI::newLine();
        
        // Resumen
        CLI::write('═══════════════════════════════════════', 'white');
        CLI::write('CLEANUP SUMMARY:', 'yellow');
        CLI::write("  Remembered logins: {$rememberedLogins}", 'white');
        CLI::write("  Reset tokens: {$resetTokens}", 'white');
        CLI::write("  Unactivated accounts: {$unactivatedAccounts}", 'white');
        CLI::write('═══════════════════════════════════════', 'white');
        CLI::newLine();
        CLI::write('Cleanup completed!', 'green');
    }
}