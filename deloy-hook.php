<?php
// =============================================
// CẤU HÌNH BẮT BUỘC
// =============================================
$secret = 'nibo123@123'; // Khớp EXACT với GitHub Webhook
$repoDir = '/home/taphoat4/thien_van';
$logFile = $repoDir . '/deploy.log';

// =============================================
// XỬ LÝ WEBHOOK
// =============================================
try {
    // Ghi nhận request vào log (debug)
    file_put_contents($repoDir . '/webhook-debug.log', date('Y-m-d H:i:s') . " - Webhook triggered\n", FILE_APPEND);

    // 1. Kiểm tra phương thức POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // 2. Lấy payload và chữ ký
    $payload = file_get_contents('php://input');
    $githubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

    // 3. Xác thực chữ ký
    $calculatedSig = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($calculatedSig, $githubSignature)) {
        throw new Exception('Invalid signature');
    }

    // =============================================
    // THỰC THI DEPLOY
    // =============================================
    $commands = [
        "cd $repoDir",
        "git reset --hard HEAD",
        "git pull origin main 2>&1",
        "composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader 2>&1",
        "php artisan config:cache 2>&1",
        "php artisan route:cache 2>&1",
        "php artisan view:cache 2>&1",
    ];

    $output = "[" . date('Y-m-d H:i:s') . "] DEPLOY STARTED\n";
    foreach ($commands as $command) {
        $output .= "\n\$ $command\n" . shell_exec("$command 2>&1") . "\n";
    }
    $output .= "DEPLOY COMPLETED\n\n";

    // Ghi log và trả kết quả
    file_put_contents($logFile, $output, FILE_APPEND);
    echo "✅ Deploy thành công | " . date('Y-m-d H:i:s');

} catch (Exception $e) {
    $errorMsg = "❌ LỖI: " . $e->getMessage() . " | " . date('Y-m-d H:i:s');
    file_put_contents($logFile, $errorMsg . "\n", FILE_APPEND);
    http_response_code(400);
    echo $errorMsg;
}