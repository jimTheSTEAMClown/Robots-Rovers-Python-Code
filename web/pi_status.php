<?php
// ============================================================
// Pi Status Page
// Reads pi_status.txt and displays formatted Pi status data
// ============================================================

$statusFile = '/var/www/html/pi_status.txt';
$data = [];

// --- Read and parse the text file ---
if (file_exists($statusFile)) {
    $lines = file($statusFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $data[trim($key)] = trim($value);
        }
    }
} else {
    $error = "Status file not found: " . $statusFile;
}

// --- Helper: return value or fallback ---
function val($data, $key, $fallback = 'N/A') {
    return isset($data[$key]) && $data[$key] !== '' ? htmlspecialchars($data[$key]) : $fallback;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30"> <!-- Auto-refresh every 30 seconds -->
    <title>Raspberry Pi Status</title>
    <style>
        body {
            font-family: monospace;
            background: #1a1a1a;
            color: #00ff88;
            padding: 30px;
            max-width: 700px;
            margin: auto;
        }
        h1 { color: #ffffff; border-bottom: 1px solid #00ff88; padding-bottom: 10px; }
        h2 { color: #aaffcc; margin-top: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 8px 12px; border-bottom: 1px solid #333; }
        td:first-child { color: #aaaaaa; width: 40%; }
        td:last-child { color: #00ff88; font-weight: bold; }
        .error { color: #ff4444; }
        .footer { margin-top: 30px; color: #555; font-size: 0.85em; }
    </style>
</head>
<body>

<h1>🍓 Raspberry Pi Status</h1>

<?php if (isset($error)): ?>
    <p class="error">⚠️ <?= $error ?></p>
<?php else: ?>

    <h2>🌐 Network</h2>
    <table>
        <tr><td>Hostname</td><td><?= val($data, 'hostname') ?></td></tr>
        <tr><td>Wi-Fi IP (wlan0)</td><td><?= val($data, 'ip_wlan') ?></td></tr>
        <tr><td>Ethernet IP (eth0)</td><td><?= val($data, 'ip_eth') ?></td></tr>
    </table>

    <h2>🖥️ CPU</h2>
    <table>
        <tr><td>Temperature</td><td><?= val($data, 'cpu_temp') ?></td></tr>
        <tr><td>CPU Usage</td><td><?= val($data, 'cpu_usage') ?></td></tr>
        <tr><td>Uptime</td><td><?= val($data, 'uptime') ?></td></tr>
    </table>

    <h2>💾 Memory</h2>
    <table>
        <tr><td>Total RAM</td><td><?= val($data, 'mem_total') ?></td></tr>
        <tr><td>Used RAM</td><td><?= val($data, 'mem_used') ?></td></tr>
        <tr><td>Free RAM</td><td><?= val($data, 'mem_free') ?></td></tr>
    </table>

    <h2>💿 Disk (SD Card)</h2>
    <table>
        <tr><td>Total</td><td><?= val($data, 'disk_total') ?></td></tr>
        <tr><td>Used</td><td><?= val($data, 'disk_used') ?></td></tr>
        <tr><td>Free</td><td><?= val($data, 'disk_free') ?></td></tr>
        <tr><td>Usage</td><td><?= val($data, 'disk_percent') ?></td></tr>
    </table>

    <div class="footer">
        Last updated: <?= val($data, 'timestamp') ?> &nbsp;|&nbsp;
        Page auto-refreshes every 30 seconds
    </div>

<?php endif; ?>

</body>
</html>
