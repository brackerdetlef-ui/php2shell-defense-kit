# php2shell-defense-kit

**Security testing, hardening, and mitigation validation for php2shell-related vulnerabilities.**

A collection of diagnostic scripts, security tests, hardening resources, and documentation designed to help identify and mitigate security risks in PHP-based web environments.

---

## 🇩🇪 Deutsch

### Überblick

`php2shell-defense-kit` ist ein Sicherheitsprojekt zur Überprüfung, Absicherung und Dokumentation von Schutzmaßnahmen gegen php2shell-bezogene Sicherheitslücken.

Das Projekt richtet sich an Administratoren, Webserver-Betreiber, Webentwickler und Website-Verantwortliche. Die bereitgestellten Werkzeuge sollen dabei helfen, Sicherheitsmaßnahmen zu überprüfen, mögliche Schwachstellen zu erkennen und die Wirksamkeit von Gegenmaßnahmen zu bewerten.

### Projektziele

- Bereitstellung von Diagnose- und Sicherheitstests für PHP-Webserver.
- Überprüfung und Validierung von Schutzmaßnahmen.
- Unterstützung bei der Absicherung von PHP-basierten Webumgebungen.
- Bereitstellung reproduzierbarer Tests und Regressionstests.
- Dokumentation von Testergebnissen und empfohlenen Gegenmaßnahmen.

### Repository-Inhalte

- **Diagnose:** Skripte zur Überprüfung von Webserver- und PHP-Umgebungen.
- **Tests:** Sicherheitsprüfungen und Regressionstests.
- **Absicherung:** Skripte und Empfehlungen zur Verbesserung der Sicherheit.
- **Dokumentation:** Bedienungsanleitungen, Testergebnisse und Hinweise zu Gegenmaßnahmen.

### Verwendung

#### Erstes Diagnose-Skript: `diag_x9a8f3k21.php`

Das Skript ist für den Einsatz auf PHP-basierten Webservern vorgesehen und richtet sich unabhängig von der eingesetzten PHP-Version an Administratoren, Webentwickler und Website-Verantwortliche. Die tatsächliche Kompatibilität hängt von den im Skript verwendeten PHP-Funktionen und den jeweiligen Serverbedingungen ab.

**Vorgehensweise:**

1. Kopiere `diag_x9a8f3k21.php` in das Stammverzeichnis der Website, in dem sich üblicherweise die zentrale Einstiegsdatei wie `index.php`, `default.php` oder `index.html` befindet.
2. Ändere den Dateinamen vor dem Hochladen in einen eigenen, ausreichend schwer zu erratenden Namen.
3. Stelle sicher, dass die Datei über den Webserver erreichbar ist und die erforderlichen Berechtigungen besitzt.
4. Rufe die Datei anschließend über deinen Webbrowser auf, indem du die entsprechende URL aufrufst.
5. Werte die angezeigten Ergebnisse aus und beachte die Hinweise des Skripts.

**Wichtiger Sicherheitshinweis:** Ein geänderter Dateiname ist keine Zugriffskontrolle. Verwende nach Möglichkeit zusätzliche Zugriffsbeschränkungen und entferne das Diagnose-Skript nach Abschluss der Prüfung wieder vom Webserver, sofern es nicht ausdrücklich für einen weiteren Einsatz benötigt wird.

#### Webspace erst mal unerreichbar machen: htaccess-[andere|drupal|joomla|shopware|typo3|wordpress|simple]

1. Wählen Sie zuerst das entsprechende Script als Vorlage aus. 
   andere für andere Websites, die Umleitungen etc. benötigen
   simple sofern keine .htaccess vorher vorhanden war
2. Speichern Sie das gewünschte Script als .htaccess in Ihrem Webspace-Hauptverzeichnis und ggf. wenn benötigt auch Unterverzeichnissen
3. Passen Sie die IP in der .htaccess an. 
4. Prüfen Sie die Log-Files, ob Zugriffe von außen noch weiter in den logs-Protokolliert werden
5. Wenn nur noch Sie auf den Webspace zugreifen können, mit Ihrer IP, können Sie in Ruhe die Umstellung und Anpassungen durchführen.
6. Vergessen Sie am Ende nicht wieder den Zugriff für alle zu erlauben!

#### Hilfe und Videoanleitungen

Wer Unterstützung bei der Verwendung benötigt, findet ab dem 22. Oktober 2026 Videoanleitungen auf dem YouTube-Kanal:

**[YouTube – Datenwächter](https://www.youtube.com/@datenwächter)**

Video 2: Wie Ihr das Script bedient: 
https://www.youtube.com/watch?v=x8utj5VtGl4

Video 1: Zu dem php2shell mal etwas anders erklärt:
https://youtu.be/x8utj5VtGl4

### Verantwortungsvolle Verwendung

Dieses Projekt dient der defensiven Sicherheitsprüfung, der Überprüfung von Gegenmaßnahmen und autorisierten Sicherheitsanalysen.

Führe Tests ausschließlich auf Systemen durch, die dir gehören oder für deren Prüfung du ausdrücklich autorisiert bist. Prüfe Skripte vor der Ausführung und beachte die Auswirkungen auf produktive Systeme.

### Lizenz

Dieses Projekt steht unter der [Apache License 2.0](LICENSE).

Bei der Weitergabe sind die gemäß Lizenz erforderlichen Copyright- und Lizenzhinweise beizubehalten.

### Autor und Herkunft

**Autor:** Detlef Bracker

**Projekt:** php2shell-defense-kit

**GitHub:** [brackerdetlef-ui/php2shell-defense-kit](https://github.com/brackerdetlef-ui/php2shell-defense-kit)

Copyright © 2026 Detlef Bracker.

---

## 🇬🇧 English

### Overview

`php2shell-defense-kit` is a security project dedicated to testing, hardening, and documenting defensive measures against php2shell-related vulnerabilities.

The project is intended for system administrators, web server operators, web developers, and website owners. Its tools are designed to help assess security controls, identify potential weaknesses, and evaluate the effectiveness of mitigation measures.

### Project Goals

- Provide diagnostic and security tests for PHP web servers.
- Assess and validate defensive security measures.
- Support the hardening of PHP-based web environments.
- Provide reproducible security and regression tests.
- Document test results and recommended mitigations.

### Repository Contents

- **Diagnostics:** Scripts for examining web server and PHP environments.
- **Tests:** Security checks and regression tests.
- **Hardening:** Scripts and recommendations for improving security.
- **Documentation:** Usage instructions, test results, and mitigation guidance.

### Usage

#### First Diagnostic Script: `diag_x9a8f3k21.php`

This script is intended for use on PHP-based web servers and is designed for administrators, web developers, and website owners, regardless of the PHP version in use. Actual compatibility depends on the PHP functions used by the script and the server environment.

**Procedure:**

1. Copy `diag_x9a8f3k21.php` into the website's document root, where the main entry point, such as `index.php`, `default.php`, or `index.html`, is normally located.
2. Rename the file before uploading it, using a unique name that is sufficiently difficult to guess.
3. Ensure that the file is accessible through the web server and has the required permissions.
4. Open the script in your web browser by visiting its corresponding URL.
5. Review the displayed results and follow the script's recommendations.

**Important security note:** Renaming the file is not an access control mechanism. Where possible, apply additional access restrictions and remove the diagnostic script from the web server after completing the assessment unless it is explicitly required for further use.

#### Help and Video Tutorials

Users who need assistance can find video tutorials starting October 22, 2026, on the following YouTube channel:

**[YouTube – Datenwächter](https://www.youtube.com/@datenwächter)**

### Responsible Use

This project is intended for defensive security testing, mitigation validation, and authorized security assessments.

Only test systems you own or are explicitly authorized to assess. Review scripts before execution and consider their potential impact on production environments.

### License

This project is licensed under the [Apache License 2.0](LICENSE).

When redistributing the project, retain the copyright and license notices required by the applicable license.

### Author and Attribution

**Author:** Detlef Bracker

**Project:** php2shell-defense-kit

**GitHub:** [brackerdetlef-ui/php2shell-defense-kit](https://github.com/brackerdetlef-ui/php2shell-defense-kit)

Copyright © 2026 Detlef Bracker.

---

*This project focuses on defensive security, mitigation validation, and maintaining verifiable security controls.*
