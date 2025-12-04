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

### Dashboard Widget
- 📊 Türchen-Übersicht im TYPO3 Dashboard
- 📊 Anzeige der Anzahl angelegter Türchen
- 📊 Status der aktiven/inaktiven Türchen
- 📊 Sortierung nach Türchen-Nummer
- 📊 Scrollbare Liste für alle 24 Türchen

### Gutschein-System
- 🎁 Digitale Gutscheine für jedes Türchen
- 🎁 Anpassbare Gutschein-Vorlagen (Klassisch, Santa, Modern)
- 🎁 Download-Funktion als PNG
- 🎁 Personalisierbar (Für wen, Von wem, Beschreibung)
- 🎁 Echtzeit-Vorschau bei der Erstellung
- 🎁 Verwaltung über Frontend-Plugin mit Türchen-Zuordnung
- 🎁 Übersicht in der Türchen-Management-Ansicht

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

### 4. Dashboard Widget aktivieren (optional)

Das Adventskalender Extension bietet ein Dashboard Widget für einen schnellen Überblick:

1. Im TYPO3 Backend → **Dashboard**
2. **"Widget zu 'Christmas' hinzufügen"** oder ähnlich klicken
3. In der Widget-Liste **"Adventskalender - Türen"** suchen
4. Widget mit Klick hinzufügen

Das Widget zeigt:
- 📊 Gesamtzahl der angelegten Türchen
- ✅ Anzahl der aktivierten Türchen
- 📋 Vollständige Liste aller Türchen mit Status
- 🔢 Sortiert nach Tag (1-24)

Das Widget aktualisiert sich automatisch, wenn neue Türchen angelegt oder Status geändert werden.

### 5. Gutschein verwalten (optional)

#### Im Backend (klassisch)
Im Türchen-Datensatz:
1. Tab **"Gutschein"**
2. **"Create new"** klicken
3. Felder ausfüllen:
   - **Für (Name)**: Empfänger
   - **Beschreibung**: Wofür der Gutschein ist
   - **Von (Name)**: Absender
   - **Design**: Wähle zwischen Klassisch (Gold), Santa (Rot) oder Modern (Blau)

#### Im Frontend (neu!)
1. Seite mit **"Adventskalender - Verwaltung"** Plugin öffnen
2. Tab **"Gutscheine"** klicken
3. **"+ Neuer Gutschein"** klicken
4. Felder ausfüllen:
   - **Türchen (Tag)**: Zu welchem Tag gehört der Gutschein
   - **Titel**: Gutschein-Überschrift
   - **Für**: Empfänger-Name
   - **Beschreibung**: Inhalt des Gutscheins
   - **Von**: Absender-Name
   - **Design**: Gestaltung wählen
5. **"Gutschein erstellen"** oder **"Änderungen speichern"** klicken
6. Gutschein-Vorschau wird in Echtzeit angezeigt

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

### Farbeinstellungen pro Site

Die Farben können für jede Site individuell in `config/sites/[sitename]/settings.yaml` konfiguriert werden:

```yaml
# Geschlossene Türchen Farben
adventskalender.doorLockedColorStart: '#c31432'
adventskalender.doorLockedColorEnd: '#d32f2f'

# Offene Türchen Farben
adventskalender.doorUnlockedColorStart: '#0f7c3c'
adventskalender.doorUnlockedColorEnd: '#2d5016'

# Spezielle Farben
adventskalender.specialChristmasColorStart: '#ffd700'
adventskalender.specialChristmasColorEnd: '#ff8c00'
adventskalender.specialNikolausColorStart: '#ff0000'
adventskalender.specialNikolausColorEnd: '#8b0000'

# Weitere Einstellungen
adventskalender.voucherHeadline: 'Geschenkgutschein'
adventskalender.musicEnabled: true
adventskalender.snowEnabled: true
```

### CSS-Implementierung der Farben

Die Farben werden im Frontend als CSS-Variablen implementiert:

- **`--door-unlocked-start`** - Startfarbe für geöffnete Türchen
- **`--door-unlocked-end`** - Endfarbe für geöffnete Türchen  
- **`--door-locked-start`** - Startfarbe für geschlossene Türchen
- **`--door-locked-end`** - Endfarbe für geschlossene Türchen
- **`--door-christmas-start`** - Startfarbe Heiligabend (Türchen 24)
- **`--door-christmas-end`** - Endfarbe Heiligabend
- **`--door-nikolaus-start`** - Startfarbe Nikolaus (Türchen 6)
- **`--door-nikolaus-end`** - Endfarbe Nikolaus
- **`--lightbox-accent`** - Akzentfarbe für Lightbox & Gutscheine

Diese Variablen werden automatisch aus den Site Settings gespeist und beeinflussen:
- **Türchen**: Hintergrund-Farbverlauf, Hover-Effekte
- **Lightbox**: Badges, Buttons, Gutschein-Design
- **Buttons**: Musik-Toggle, Download-Buttons

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

## Datenbankstruktur

### Türchen (tx_adventskalender_domain_model_door)
- `uid` - Eindeutige ID
- `day` - Tag (1-24, erforderlich)
- `title` - Titel des Türchens
- `description` - Kurzbeschreibung
- `content` - Hauptinhalt (RTE)
- `image` - Bild-Dateireferenz
- `video` - Video-Dateireferenz
- `audio` - Audio-Dateireferenz
- `link` - Externe URL
- `is_active` - Status aktiv/inaktiv
- `voucher` - Verweis auf zugehörigen Gutschein
- `custom_style`, `custom_color_start`, `custom_color_end` - Benutzerdefinierte Farben

### Gutscheine (tx_adventskalender_domain_model_voucher)
- `uid` - Eindeutige ID
- `headline` - Titel des Gutscheins
- `for_name` - Für (Empfänger)
- `from_name` - Von (Absender)
- `description` - Beschreibung/Inhalt
- `design` - Design-Template (classic, santa)
- `door` - Verweis auf zugehöriges Türchen (inverse Relation)

## Technische Details

- **TYPO3-Version**: 13.4+
- **PHP-Version**: 8.2+
- **Namespace**: `Hamstah\Adventskalender`
- **Extension-Key**: `adventskalender`
- **Abhängigkeiten**: 
  - typo3/cms-core
  - typo3/cms-extbase
  - typo3/cms-fluid
- **Relationen**: Door ↔ Voucher (1:1 Beziehung, bidirektional)

## QR-Code Generierung für Gutscheine

Die Adventskalender-Extension generiert automatisch QR-Codes für Gutscheine. Diese ermöglichen es, Gutscheincodes einfach zu scannen und zu validieren.

### Funktionsweise

- **Client-seitige Generierung**: QR-Codes werden mittels der [qrcodejs](https://davidshimjs.github.io/qrcodejs/) Bibliothek im Frontend generiert
- **Automatische Erzeugung**: Beim Öffnen einer Tür mit Gutschein wird der QR-Code automatisch aus dem Gutschein-Code erzeugt
- **Hochauflösung**: QR-Codes werden mit 120x120px rendert, unterstützen verschiedene Design-Varianten

### QR-Code Konfiguration

**Datei**: `Resources/Private/Partials/Voucher.html`

```html
<div id="qrcodeElement"></div>
<script>
  new QRCode(document.getElementById("qrcodeElement"), {
    text: "{voucherCode}",
    width: 120,
    height: 120,
    correctLevel: QRCode.CorrectLevel.H
  });
</script>
```

**Parameter**:
- `text`: Der zu kodierende Gutschein-Code
- `width`: Breite des QR-Codes (px)
- `height`: Höhe des QR-Codes (px)
- `correctLevel`: Fehlerkorrektur-Level (H = High)

### Design-Varianten

Die Extension unterstützt zwei Design-Vorlagen für Gutscheine:

1. **Santa Design** (`template="santa"`)
   - Weihnachtliches Design mit Santa-Motiven
   - Spezielle Styling für festliche Optik

2. **Classic Design** (`template="classic"`)
   - Minimalistisches, neutrales Design
   - Universell einsetzbar

**CSS Styling**: `Resources/Public/Css/adventskalender.css`

### Download-Funktion

Gutscheine können mit QR-Code als PNG-Datei heruntergeladen werden:

```javascript
function downloadVoucher() {
  const voucher = document.getElementById('voucherElement');
  html2canvas(voucher, {
    backgroundColor: '#ffffff',
    scale: 2,
    logging: false
  }).then(canvas => {
    const link = document.createElement('a');
    link.download = 'Gutschein.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
  });
}
```

Hierfür wird die [html2canvas](https://html2canvas.hertzen.com/) Bibliothek verwendet.

### Backend-Integration

**Datei**: `Classes/Domain/Model/Voucher.php`

- Enthält die Eigenschaft `voucherCode` für den Gutschein-Code
- Der Code wird vom Backend gespeichert und im Frontend als QR-Code kodiert

**Management**: `Classes/Controller/ManagementController.php`
- Verwaltung von Gutschein-Daten
- Zuordnung zu Adventskalender-Türen

## Externe Bibliotheken

- [Bootstrap Icons](https://icons.getbootstrap.com/) - Icons
- [Animate.css](https://animate.style/) - Animationen
- [html2canvas](https://html2canvas.hertzen.com/) - Gutschein-Download
- [qrcodejs](https://davidshimjs.github.io/qrcodejs/) - QR-Code Generierung

## Ordnerstruktur

```
adventskalender/
├── Classes/
│   ├── Controller/
│   │   ├── AdventskalenderController.php (Anzeige)
│   │   └── ManagementController.php (Frontend-Verwaltung)
│   ├── Dashboard/
│   │   └── DoorWidget.php (Dashboard Widget)
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
│   │   │   ├── locallang_db.xlf
│   │   │   └── locallang_dashboard.xlf
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
│       │   ├── adventskalender.css
│       │   └── dashboard.css
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

## Dashboard Widget

Das Dashboard Widget bietet eine schnelle Übersicht über alle angelegten Adventskalender-Türchen:

### Features des Widgets

- **Statistik**: Zeigt die Gesamtanzahl und Anzahl der aktiven Türchen
- **Türchen-Liste**: Alle 24 Türchen sortiert nach Nummer
- **Status-Anzeige**: Grünes Häkchen für aktive, rotes X für inaktive Türchen
- **Scrollbar**: Für die übersichtliche Anzeige aller Türchen
- **Echtzeit-Updates**: Widget aktualisiert sich automatisch

### Dashboard Widget in einer Site hinzufügen

1. Im TYPO3 Backend zum **Dashboard** navigieren
2. Auf **"Widget zu '...' hinzufügen"** klicken
3. In der Liste **"Adventskalender - Türen"** auswählen
4. Mit Klick hinzufügen

Das Widget ist sofort verfügbar und zeigt alle in der Datenbank angelegten Türchen.

## Frontend-Management Plugin

Detaillierte Dokumentation zum Management-Plugin finden Sie in [MANAGEMENT_PLUGIN.md](MANAGEMENT_PLUGIN.md).

Das Plugin bietet:
- **Benutzerfreundliche Verwaltungsoberfläche** - Alle Türchen in einer übersichtlichen Tabelle
- **Flexibles Bearbeiten** - Ändern Sie Titel, Beschreibung, Inhalt und Status
- **Schnelles Erstellen** - Neue Türchen mit wenigen Klicks hinzufügen
- **Sichere Löschung** - Mit Bestätigungsdialog zum Schutz vor Unfällen
- **Responsive Design** - Funktioniert auf Desktop, Tablet und Smartphone
- **Gutschein-Verwaltung** - Gutscheine direkt im Frontend anlegen und bearbeiten
- **Gutschein-Vorschau** - Echtzeit-Vorschau wie der Gutschein auf der Website aussieht
- **Türchen-Zuordnung** - Gutscheine können direkt einem Türchen zugeordnet werden
- **Gutschein-Designs** - Mehrere Design-Optionen zur Auswahl

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
