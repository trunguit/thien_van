<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeployHookController extends Controller
{
    public function handleDeploy(Request $request)
    {
        // 1. Xác thực webhook
        $secret = 'nibo123@123';
        $signature = $request->header('X-Hub-Signature-256');
        $payload = $request->getContent();

        if (!$signature || !hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
            Log::error('Invalid webhook signature');
            abort(403, 'Invalid signature');
        }

        // 2. Xác định đường dẫn Composer
        $composerPath = $this->findComposer();
        $phpPath = $this->findPHP();

        // 3. Thực thi lệnh deploy
        $commands = [
            'git reset --hard HEAD',
            'git pull origin main',
            $composerPath . ' install --no-dev --optimize-autoloader --no-interaction',
            $phpPath . ' artisan migrate --force',
            $phpPath . ' artisan config:cache',
            $phpPath . ' artisan view:cache',
        ];

        $output = [];
        $success = true;

        foreach ($commands as $cmd) {
            exec('cd ' . base_path() . ' && ' . $cmd . ' 2>&1', $cmdOutput, $returnCode);
            $output[$cmd] = [
                'output' => implode("\n", $cmdOutput),
                'status' => $returnCode === 0 ? 'success' : 'failed'
            ];

            if ($returnCode !== 0) {
                $success = false;
                Log::error("Command failed: {$cmd}", $cmdOutput);
            }
        }

        // 4. Ghi log và trả kết quả
        Log::info('Deploy completed', ['success' => $success, 'output' => $output]);

        return response()->json([
            'status' => $success ? 'success' : 'partial_failure',
            'output' => $output
        ], $success ? 200 : 500);
    }

    protected function findComposer()
    {
        // Thử các đường dẫn phổ biến của Composer
        $paths = [
            '/usr/local/bin/composer',
            '/usr/bin/composer',
            '/opt/alt/php81/usr/bin/composer',  // Đường dẫn thường thấy trên shared hosting
            base_path() . '/composer.phar'        // Dùng composer.phar trong project
        ];

        foreach ($paths as $path) {
            if (is_executable($path)) {
                return $path;
            }
        }

        throw new \RuntimeException('Composer executable not found');
    }

    protected function findPHP()
    {
        // Tương tự cho PHP
        $paths = [
            '/usr/bin/php',
            '/usr/local/bin/php',
            '/opt/alt/php81/usr/bin/php',
            '/usr/local/php81/bin/php'
        ];

        foreach ($paths as $path) {
            if (is_executable($path)) {
                return $path;
            }
        }

        return 'php'; // Fallback
    }
}
