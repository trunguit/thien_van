<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeployHookController extends Controller
{
    public function handleDeploy(Request $request)
    {
        // 1. Xác thực Secret
        $secret = 'nibo123@123';
        $signature = $request->header('X-Hub-Signature-256');
        $payload = $request->getContent();

        if (!$signature || !hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
            Log::error('Deploy hook: Invalid signature');
            abort(403, 'Invalid signature');
        }

        // 2. Thực thi lệnh
        $commands = [
            'git reset --hard HEAD',
            'git pull origin main',
            'composer install --no-dev --optimize-autoloader',
            'php artisan migrate --force',
            'php artisan config:cache',
        ];

        $output = [];
        foreach ($commands as $cmd) {
            exec('cd ' . base_path() . ' && ' . $cmd . ' 2>&1', $cmdOutput);
            $output[$cmd] = implode("\n", $cmdOutput);
        }

        // 3. Ghi log
        Log::info('Deploy executed', $output);
        return response()->json($output);
    }
}
