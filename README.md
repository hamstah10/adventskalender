# 🎄 TYPO3 Adventskalender Extension

Eine vollständige TYPO3 v13 Extension für einen interaktiven Adventskalender mit Gutschein-System und vielen Anpassungsmöglichkeiten.

## Features

### Türchen-Verwaltung
- ✅ 24 individuell gestaltbare Türchen
- ✅ Unterstützung für Bilder, Videos und Audio
- ✅ Rich-Text-Editor für Inhalte
- ✅ Externe Links pro Türchen
- ✅ Freigabe-System für Türchen
- ✅ Mehrsprachig (DE, EN, RU)
- ✅ Individuelle Icons pro Tag

### Frontend-Management Plugin
- 🖥️ Verwaltung der Türchen direkt im Frontend
- 🖥️ Tabellen-Übersicht aller Einträge
- 🖥️ Einfaches Hinzufügen neuer Türchen
- 🖥️ Bearbeiten und Löschen von Türchen
- 🖥️ Status-Kontrolle (Aktiv/Inaktiv)
- 🖥️ Responsive Design für Mobile & Desktop

### Gutschein-System
- 🎁 Digitale Gutscheine für jedes Türchen
- 🎁 Anpassbare Gutschein-Vorlage
- 🎁 Download-Funktion als PNG
- 🎁 Personalisierbar (Für wen, Von wem, Beschreibung)

### Design & Animation
- 🎨 Frei konfigurierbare Farben über Site Sets
- 🎨 Animierte Türchen (Fade-In-Effekte)
- 🎨 Weihnachtliche Dekorationen (Pferd, Rentier)
- 🎨 Schneeflocken-Animation
- 🎨 Lightbox-Ansicht für Türchen-Inhalte
- 🎨 Responsive Design

### Musik & Sound
- 🎵 Optionale Hintergrundmusik
- 🎵 Sound-Effekt für gesperrte Türchen
- 🎵 Musik-Toggle-Button

## Installation

### Via Composer (empfohlen)
```bash
composer require hamstah/adventskalender
```

### Via Extension Manager
1. Extension im Extension Manager suchen
2. "Adventskalender" installieren
3. Cache leeren

### Nach der Installation
```bash
# Cache leeren
php vendor/bin/typo3 cache:flush

# Datenbank aktualisieren
# Im Backend: Maintenance → Analyze Database Structure
```

## Konfiguration

### 1. Site Set aktivieren
1. **Site Management** → **Sites** → Deine Site bearbeiten
2. Tab **"Sets"** → "Add set" → "🎄 Adventskalender" auswählen
3. Tab **"Settings"** → Einstellungen anpassen:
   - Gutschein-Überschrift
   - Farben für offene/geschlossene Türchen
   - Hintergrundmusik ein/aus
   - Pfad zur Musikdatei

### 2. Plugin einfügen
1. Neue Seite erstellen oder vorhandene bearbeiten
2. Inhaltselement **"Plugin"** hinzufügen
3. Plugin-Typ **"Adventskalender"** auswählen

### 3. Türchen anlegen

#### Option A: Im Backend (klassisch)
1. Im TYPO3 Backend → **List** Modul
2. Ordner/Seite auswählen
3. Neuen Datensatz **"Adventskalender Türchen"** erstellen
4. Felder ausfüllen:
   - **Tag (1-24)**: Türchen-Nummer
   - **Titel**: Überschrift des Türchens
   - **Beschreibung**: Kurze Info
   - **Inhalt**: Haupttext (RTE)
   - **Medien**: Bild, Video oder Audio
   - **Link**: Externe URL
   - **Gutschein**: Optional Gutschein erstellen

#### Option B: Im Frontend (neu!)
1. Seite erstellen/bearbeiten
2. Plugin-Element **"Adventskalender - Verwaltung"** einfügen
3. Verwaltungsfläche öffnet sich mit:
   - 📋 Tabellen-Übersicht aller Türchen
   - ➕ Button zum Erstellen neuer Türchen
   - ✏️ Bearbeiten-Button pro Türchen
   - 🗑️ Löschen-Button mit Bestätigung
   - 📊 Status (Aktiv/Inaktiv) anzeigen

### 4. Gutschein erstellen (optional)
Im Türchen-Datensatz:
1. Tab **"Gutschein"**
2. **"Create new"** klicken
3. Felder ausfüllen:
   - **Für (Name)**: Empfänger
   - **Beschreibung**: Wofür der Gutschein ist
   - **Von (Name)**: Absender

## Site Set Einstellungen

Alle Einstellungen sind über Site Sets konfigurierbar:

| Einstellung | Beschreibung | Standard |
|------------|--------------|----------|
| 🎁 Gutschein Überschrift | Text auf jedem Gutschein | Geschenkgutschein |
| 🟢 Türchen Offen - Farbe Start | Verlauf-Startfarbe offen | #0f7c3c |
| 🟢 Türchen Offen - Farbe Ende | Verlauf-Endfarbe offen | #2d5016 |
| 🔴 Türchen Geschlossen - Farbe Start | Verlauf-Startfarbe gesperrt | #c31432 |
| 🔴 Türchen Geschlossen - Farbe Ende | Verlauf-Endfarbe gesperrt | #d32f2f |
| 🎵 Hintergrundmusik aktivieren | Musik ein/aus | Ein |
| 🎵 Pfad zur Musikdatei | MP3-Dateipfad | song_christmas.mp3 |
| ⭐ Tag 24 (Heiligabend) - Farbe Start | Verlauf-Startfarbe für Türchen 24 | #ffd700 |
| ⭐ Tag 24 (Heiligabend) - Farbe Ende | Verlauf-Endfarbe für Türchen 24 | #ff8c00 |
| 🎅 Tag 6 (Nikolaus) - Farbe Start | Verlauf-Startfarbe für Türchen 6 | #ff0000 |
| 🎅 Tag 6 (Nikolaus) - Farbe Ende | Verlauf-Endfarbe für Türchen 6 | #8b0000 |
| ❄️ Schnee-Animation aktivieren | Schneeflocken-Animation ein/aus | Ein |

## Freigabe-Steuerung

Die Freigabe der Türchen kann angepasst werden:

**Option 1: Direkt im Template** (`List.html` Zeile 38)
```html
<f:if condition="{door.day} == 1 || {door.day} == 6">
```

**Option 2: In der Door-Klasse** (`Classes/Domain/Model/Door.php`)
```php
public function isUnlocked(): bool
{
    $today = (int)date('j');
    $currentMonth = (int)date('n');
    return $currentMonth === 12 && $this->day <= $today;
}
```

## Mehrsprachigkeit

Die Extension unterstützt vollständige Übersetzungen:
- 🇩🇪 Deutsch (Standard)
- 🇬🇧 Englisch
- 🇷🇺 Russisch

**Übersetzbare Elemente:**
- Frontend-Texte
- Türchen-Datensätze (Titel, Beschreibung, Inhalt)
- Gutscheine (Namen, Beschreibung)

## Technische Details

- **TYPO3-Version**: 13.4+
- **PHP-Version**: 8.2+
- **Namespace**: `Hamstah\Adventskalender`
- **Extension-Key**: `adventskalender`
- **Abhängigkeiten**: 
  - typo3/cms-core
  - typo3/cms-extbase
  - typo3/cms-fluid

## Externe Bibliotheken

- [Bootstrap Icons](https://icons.getbootstrap.com/) - Icons
- [Animate.css](https://animate.style/) - Animationen
- [html2canvas](https://html2canvas.hertzen.com/) - Gutschein-Download

## Ordnerstruktur

```
adventskalender/
├── Classes/
│   ├── Controller/
│   │   ├── AdventskalenderController.php (Anzeige)
│   │   └── ManagementController.php (Frontend-Verwaltung)
│   ├── Domain/
│   │   ├── Model/
│   │   │   ├── Door.php
│   │   │   └── Voucher.php
│   │   └── Repository/
│   │       └── DoorRepository.php
│   └── Hooks/
│       └── PageRendererHook.php
├── Configuration/
│   ├── FlexForms/
│   │   ├── PluginSettings.xml (Anzeige-Plugin)
│   │   └── ManagementSettings.xml (Management-Plugin)
│   ├── Sets/
│   │   └── Adventskalender/
│   │       ├── config.yaml
│   │       ├── setup.typoscript
│   │       └── settings.definitions.typoscript
│   └── TCA/
│       ├── Overrides/
│       │   └── tt_content.php
│       ├── tx_adventskalender_domain_model_door.php
│       └── tx_adventskalender_domain_model_voucher.php
├── Resources/
│   ├── Private/
│   │   ├── Language/
│   │   │   ├── locallang.xlf
│   │   │   ├── de.locallang.xlf
│   │   │   ├── ru.locallang.xlf
│   │   │   └── locallang_db.xlf
│   │   ├── Layouts/
│   │   │   └── Default.html
│   │   ├── Partials/
│   │   │   └── Voucher.html
│   │   └── Templates/
│   │       ├── Adventskalender/
│   │       │   └── List.html (Anzeige-Template)
│   │       └── Management/
│   │           ├── Index.html (Übersicht)
│   │           ├── Edit.html (Bearbeiten)
│   │           └── New.html (Erstellen)
│   └── Public/
│       ├── Animations/
│       │   ├── santa-sleigh.html
│       │   └── santa-sleigh.css
│       ├── Css/
│       │   └── adventskalender.css
│       ├── Icons/
│       │   ├── Extension.svg
│       │   ├── door.svg
│       │   └── voucher.svg
│       ├── Images/
│       │   ├── pferd.png
│       │   └── renntier.png
│       ├── JavaScript/
│       │   └── adventskalender.js
│       └── Music/
│           ├── song_christmas.mp3
│           └── Zonk-sound.mp3
├── composer.json
├── ext_emconf.php
├── ext_localconf.php
├── ext_tables.sql
├── MANAGEMENT_PLUGIN.md
├── README.md
├── LICENSE
└── CHANGELOG.md
```

## TER Upload Checkliste

Vor dem Upload ins TER bitte prüfen:

- [x] `ext_emconf.php` vollständig ausgefüllt
- [x] `composer.json` mit allen Metadaten
- [x] README.md mit Dokumentation
- [x] LICENSE Datei vorhanden
- [x] Extension Icon (Extension.svg)
- [x] Alle Sprachdateien vollständig
- [x] CHANGELOG.md vorhanden
- [ ] Alle Funktionen getestet
- [ ] PHP-Code entspricht TYPO3 Coding Guidelines
- [ ] Keine Sicherheitslücken
- [ ] Keine absoluten Pfade im Code

## Frontend-Management Plugin

Detaillierte Dokumentation zum Management-Plugin finden Sie in [MANAGEMENT_PLUGIN.md](MANAGEMENT_PLUGIN.md).

Das Plugin bietet:
- **Benutzerfreundliche Verwaltungsoberfläche** - Alle Türchen in einer übersichtlichen Tabelle
- **Flexibles Bearbeiten** - Ändern Sie Titel, Beschreibung, Inhalt und Status
- **Schnelles Erstellen** - Neue Türchen mit wenigen Klicks hinzufügen
- **Sichere Löschung** - Mit Bestätigungsdialog zum Schutz vor Unfällen
- **Responsive Design** - Funktioniert auf Desktop, Tablet und Smartphone

### Einsatz des Management-Plugins

1. Neue Seite für die Verwaltung erstellen (z.B. "/admin/adventskalender")
2. Plugin-Element "Adventskalender - Verwaltung" einfügen
3. Optional: Zugriff mit Benutzer-Authentifizierung schützen

### FlexForm-Einstellungen

Das Management-Plugin unterstützt diese Einstellungen:
- **Seitentitel**: Anpassbar über FlexForm
- **Einträge pro Seite**: Anzahl anzeigbarer Einträge
- **Löschen erlauben**: Aktivierung/Deaktivierung der Löschfunktion

## Support & Bugs

Bei Problemen oder Feature-Requests:
- **E-Mail**: hamstahstudio@gmail.com
- **Homepage**: https://www.hamstahstudio.de
- **Dokumentation**: Siehe [MANAGEMENT_PLUGIN.md](MANAGEMENT_PLUGIN.md) für Frontend-Verwaltung

## Lizenz

GPL-2.0-or-later

## Autor

**Andre Sancken**  
Hamstah Studio  
hamstahstudio@gmail.com  
https://www.hamstahstudio.de
