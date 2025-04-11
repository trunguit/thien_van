<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeployHookController extends Controller
{
    public function handleDeploy(Request $request)
    {
        // 0. Kiểm tra môi trường (chỉ chạy trên production)
        if (app()->environment('local')) {
            return response()->json(['error' => 'Webhook chỉ chạy trên production'], 403);
        }

        // 1. Xác thực Secret
        $secret = 'nibo123@123';
        $signature = $request->header('X-Hub-Signature-256');
        $payload = $request->getContent();

        if (!$signature || !hash_equals('sha256=' . hash_hmac('sha256', $payload, $secret), $signature)) {
            Log::error('Deploy hook: Invalid signature');
            abort(403, 'Invalid signature');
        }

        // 2. Thực thi lệnh (có thêm kiểm tra lỗi)
        $commands = [
            'git reset --hard HEAD',
            'git pull origin main',
            'composer install --no-dev --optimize-autoloader --no-interaction',
            'php artisan migrate --force',
            'php artisan config:cache',
            'php artisan view:cache',
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
                Log::error("Deploy failed at command: {$cmd}", $cmdOutput);
            }
        }

        // 3. Ghi log và trả kết quả
        Log::info('Deploy executed', ['success' => $success, 'details' => $output]);

        return response()->json([
            'status' => $success ? 'success' : 'partial_failure',
            'output' => $output
        ], $success ? 200 : 500);
    }
}
