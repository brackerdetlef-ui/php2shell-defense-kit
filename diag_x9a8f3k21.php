<?php
/**
 * PHP-Sicherheits- & Konfigurations-Check (CVE-2026-109618 & CVE-2026-109619)
 * 
 * ANLEITUNG:
 * 1. Speichern Sie diese Datei unter einem UNERRATBAREN Namen (z. B. diag_x9a8f3k21.php).
 * 2. Setzen Sie $DEBUG_MODE = 1; um den Check auszuführen.
 * 3. Setzen Sie $DEBUG_MODE = 0; nach der Überprüfung SOFORT wieder ein!
 *
 * Project:     php2shell-defense-kit
 * Description: Security tests, hardening scripts, and documentation
 *              for php2shell mitigations.
 *
 * Copyright (c) 2026 Detlef Bracker
 * GitHub:      https://github.com/brackerdetlef-ui/php2shell-defense-kit
 *
 * License:     Apache-2.0
 *              See the LICENSE file in the project root for details.
 *
 * This file is part of php2shell-defense-kit.
 * Please retain this copyright notice and the project attribution
 * in copies and redistributed versions of this file.
 */

// =========================================================================
// HAUPTSCHALTER: 1 = Aktiviert (Anzeige sichtbar), 0 = Deaktiviert (Stumm)
// =========================================================================
$DEBUG_MODE = 0;


// Bricht sofort ab, wenn $DEBUG_MODE nicht auf 1 steht
if ($DEBUG_MODE !== 1) {
    header("HTTP/1.1 404 Not Found");
    echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p>";
    echo '<br /><b>More informations you find under <a href="https://github.com/brackerdetlef-ui/php2shell-defense-kit">php2shell-defense-kit</a></b><br />';
    echo "</body></html>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>PHP Sicherheits-Check</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; color: #333; }
        .banner-red { background-color: #d9534f; color: white; padding: 18px; text-align: center; font-weight: bold; border-radius: 6px; margin-bottom: 25px; font-size: 1.15em; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .card { background: white; padding: 20px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.08); margin-bottom: 25px; }
        .badge-ok { background-color: #5cb85c; color: white; padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 0.9em; }
        .badge-danger { background-color: #d9534f; color: white; padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 0.9em; }
        .badge-info { background-color: #0275d8; color: white; padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 0.9em; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #e9ecef; }
        th { background-color: #f8f9fa; }
    </style>
</head>
<body>

    <!-- OBERER DICHTER ROTER WARNHINWEIS -->
    <div class="banner-red">
        🚨 ACHTUNG: DIAGNOSE-MODUS IST AKTIV! 🚨<br>
        <span style="font-weight: normal; font-size: 0.9em;">
            Vergessen Sie nicht, am Anfang dieser Datei <code>$DEBUG_MODE = 0;</code> einzutragen, sobald Sie die Überprüfung abgeschlossen haben!<br />
            More informations you find under <a href="https://github.com/brackerdetlef-ui/php2shell-defense-kit">php2shell-defense-kit</a>
        </span>
    </div>

    <div class="card">
        <h2>1. Aktueller Status dieser PHP-Runtime</h2>
        <?php
        $php_version     = phpversion();
        $sapi_name       = php_sapi_name();
        $upload_progress = ini_get('session.upload_progress.enabled');
        $memory_limit    = ini_get('memory_limit');
        $post_max_size   = ini_get('post_max_size');
        $upload_max_size = ini_get('upload_max_filesize');
        $backtraces      = ini_get('fatal_error_backtraces');

        // Prüfung auf gefixte Versionen
        $is_patched = false;
        if (version_compare($php_version, '8.5.12', '>=') ||
           (version_compare($php_version, '8.4.27', '>=') && version_compare($php_version, '8.5.0', '<')) ||
           (version_compare($php_version, '8.3.36', '>=') && version_compare($php_version, '8.4.0', '<')) ||
           (version_compare($php_version, '8.2.35', '>=') && version_compare($php_version, '8.3.0', '<'))) {
            $is_patched = true;
        }
        ?>

        <table>
            <tr>
                <th>Einstellung / Parameter</th>
                <th>Ist-Wert (Laufzeit)</th>
                <th>Bewertung / Status</th>
            </tr>
            <tr>
                <td><strong>PHP Version</strong></td>
                <td><code><?= htmlspecialchars($php_version) ?></code></td>
                <td>
                    <?= $is_patched 
                        ? '<span class="badge-ok">GEPATCHT / SICHER</span>' 
                        : '<span class="badge-danger">GEFÄHRDET (Update erforderlich)</span>' ?>
                </td>
            </tr>
            <tr>
                <td><strong>Server SAPI</strong></td>
                <td><code><?= htmlspecialchars($sapi_name) ?></code></td>
                <td><span class="badge-info">Info</span> (z. B. fpm-fcgi, apache2handler, cgi)</td>
            </tr>
            <tr>
                <td><strong>session.upload_progress.enabled</strong></td>
                <td><code><?= $upload_progress ? 'On (1)' : 'Off (0)' ?></code></td>
                <td>
                    <?= !$upload_progress 
                        ? '<span class="badge-ok">OK (Deaktiviert)</span>' 
                        : '<span class="badge-danger">GEFÄHRDET (Dringend auf Off setzen!)</span>' ?>
                </td>
            </tr>
            <tr>
                <td><strong>memory_limit</strong></td>
                <td><code><?= htmlspecialchars($memory_limit) ?></code></td>
                <td>
                    <?= ($memory_limit === '-1') 
                        ? '<span class="badge-ok">OK (-1 gesetzt)</span>' 
                        : '<span class="badge-info">Eingeschränkt (OOM-Pfade beachten)</span>' ?>
                </td>
            </tr>
            <tr>
                <td><strong>post_max_size / upload_max_filesize</strong></td>
                <td><code><?= htmlspecialchars($post_max_size) ?></code> / <code><?= htmlspecialchars($upload_max_size) ?></code></td>
                <td><span class="badge-info">Info</span></td>
            </tr>
            <?php if (version_compare($php_version, '8.5.0', '>=')): ?>
            <tr>
                <td><strong>fatal_error_backtraces</strong> (nur PHP 8.5)</td>
                <td><code><?= $backtraces ? 'On (1)' : 'Off (0)' ?></code></td>
                <td>
                    <?= !$backtraces 
                        ? '<span class="badge-ok">OK (Deaktiviert)</span>' 
                        : '<span class="badge-danger">Empfehlung: auf 0 setzen</span>' ?>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- WIEDERHOLUNG DER EINSTELLUNGEN ALS PRÜF-REFERENZ FÜR SPÄTERE TESTS -->
    <div class="card">
        <h2>2. Soll-Spezifikation & Prüf-Referenz (Für spätere Re-Tests)</h2>
        <p>Nutzen Sie diese Soll-Vorgaben bei zukünftigen Kontrollen, um nach Server-Updates oder Konfigurationsänderungen zu vergleichen:</p>
        <table>
            <tr>
                <th>Prüfpunkt</th>
                <th>Ziel- / Soll-Wert</th>
                <th>Maßnahme bei Abweichung</th>
            </tr>
            <tr>
                <td>Sichere PHP-Versionen</td>
                <td><code>8.2.35+</code>, <code>8.3.36+</code>, <code>8.4.27+</code>, <code>8.5.12+</code></td>
                <td>PHP-Runtime / FPM-Pool über Hoster/Package-Manager aktualisieren.</td>
            </tr>
            <tr>
                <td>Upload-Fortschritt</td>
                <td><code>session.upload_progress.enabled = Off</code></td>
                <td>In <code>php.ini</code> / FPM-Pool setzen & FPM-Dienst zwingend neu starten.</td>
            </tr>
            <tr>
                <td>Speicherlimit</td>
                <td><code>memory_limit = -1</code> (administrativ)</td>
                <td>Setzen, um künstliche OOM-Abbrüche beim Parsing zu verhindern.</td>
            </tr>
            <tr>
                <td>Dienst-Neustart</td>
                <td>FPM-Prozesse neu geladen</td>
                <td>Nach jeder Änderung <code>systemctl restart php-fpm</code> ausführen.</td>
            </tr>
        </table>
    </div>

    <!-- UNTERER DICHTER ROTER WARNHINWEIS -->
    <div class="banner-red">
        🚨 SKRIPT WIEDER DEAKTIVIEREN! 🚨<br>
        <span style="font-weight: normal; font-size: 0.9em;">
            Setzen Sie in der Datei am Anfang <code>$DEBUG_MODE = 0;</code>, damit das Skript ab sofort wieder stumm geschaltet ist!
        </span>
    </div>

</body>
</html>