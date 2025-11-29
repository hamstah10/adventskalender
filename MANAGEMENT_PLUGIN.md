# Adventskalender Management Plugin

## Übersicht

Das Management Plugin ist ein Frontend-Plugin, das es Benutzern ermöglicht, Adventskalender-Türchen direkt im Frontend zu verwalten und zu bearbeiten, ohne Zugang zum TYPO3 Backend zu benötigen.

## Features

### Türchen-Verwaltung
- **Übersicht**: Zeige alle Adventskalender-Türchen in einer übersichtlichen Gitter-Ansicht
- **Bearbeiten**: Existierende Türchen aktualisieren (Titel, Beschreibung, Inhalt, Link, Status)
- **Erstellen**: Neue Türchen direkt im Frontend hinzufügen
- **Löschen**: Unwanted Türchen entfernen (mit Bestätigungsdialog)

### Gutschein-Verwaltung
- **Gutschein-Übersicht**: Übersichtliche Tabelle aller Gutscheine
- **Gutschein erstellen**: Neue Gutscheine mit Titel, Beschreibung, Empfänger und Absender
- **Gutschein bearbeiten**: Alle Details nachträglich anpassen
- **Design-Optionen**: Klassisch, Modern oder Elegant
- **Gutschein löschen**: Mit Bestätigungsdialog
- **Live-Vorschau**: Echtzeit-Vorschau beim Erstellen/Bearbeiten

### Allgemein
- **Responsive Design**: Mobile-freundliche Benutzeroberfläche
- **Flash Messages**: Erfolgs- und Fehlermeldungen für Benutzeraktion
- **Tabbed Interface**: Einfacher Wechsel zwischen Türchen- und Gutschein-Verwaltung

## Installation

1. Plugin im Backend einbinden:
   - Gehe zu "Seite bearbeiten"
   - Füge einen neuen Inhaltselement hinzu
   - Wähle "Adventskalender - Verwaltung"

2. Konfigurieren:
   - **Seitentitel**: Anpassbarer Titel (optional)
   - **Einträge pro Seite**: Anzahl der Türchen in der Liste
   - **Löschen erlauben**: Aktiviere/Deaktiviere die Möglichkeit, Türchen zu löschen

## Verwendete Komponenten

### Controller: ManagementController

#### Türchen-Aktionen
- `indexAction()` - Zeigt alle Türchen an
- `editAction()` - Zeigt Bearbeitungsformular für ein Türchen
- `updateAction()` - Speichert Änderungen
- `newAction()` - Zeigt Formular für neues Türchen
- `createAction()` - Erstellt ein neues Türchen
- `deleteAction()` - Löscht ein Türchen

#### Gutschein-Aktionen
- `vouchersAction()` - Zeigt alle Gutscheine an
- `editVoucherAction()` - Zeigt Bearbeitungsformular für einen Gutschein
- `updateVoucherAction()` - Speichert Gutschein-Änderungen
- `newVoucherAction()` - Zeigt Formular für neuen Gutschein
- `createVoucherAction()` - Erstellt einen neuen Gutschein
- `deleteVoucherAction()` - Löscht einen Gutschein

### Templates

#### Türchen-Templates
- `Index.html` - Übersichtsseite mit Türchen-Tabelle
- `Edit.html` - Bearbeitungsformular für Türchen
- `New.html` - Erstellungsformular für Türchen

#### Gutschein-Templates
- `Vouchers.html` - Übersichtsseite mit Gutschein-Tabelle
- `EditVoucher.html` - Bearbeitungsformular für Gutscheine
- `NewVoucher.html` - Erstellungsformular für Gutscheine

## Bearbeitbare Felder

### Türchen-Felder
- **Türchen-Nummer**: Tag des Adventskalenders (1-31)
- **Titel**: Überschrift des Türchens (erforderlich)
- **Kurzbeschreibung**: Kurzzusammenfassung
- **Hauptinhalt**: Ausführlicher Text/HTML
- **Link**: Optional externe URL
- **Status**: Aktiv/Inaktiv

### Gutschein-Felder
- **Titel**: Überschrift des Gutscheins (erforderlich)
- **Beschreibung**: Detaillierte Beschreibung des Gutscheins
- **Für**: Name des Empfängers
- **Von**: Name des Absenders
- **Design**: Klassisch, Modern oder Elegant

## Code-Struktur

```
Classes/
├── Controller/
│   └── ManagementController.php
└── Domain/
    ├── Model/
    │   ├── Door.php
    │   └── Voucher.php
    └── Repository/
        ├── DoorRepository.php
        └── VoucherRepository.php

Configuration/
├── FlexForms/
│   └── ManagementSettings.xml
└── TCA/Overrides/
    └── tt_content.php (aktualisiert)

Resources/Private/
├── Language/
│   └── locallang_db.xlf (aktualisiert)
└── Templates/Management/
    ├── Index.html
    ├── Edit.html
    ├── New.html
    ├── Vouchers.html
    ├── EditVoucher.html
    └── NewVoucher.html
```

## Design-Klassen und Styling

Das Plugin nutzt inline-CSS mit folgenden Hauptklassen:

- `.management-container` - Hauptcontainer
- `.doors-grid` - CSS-Grid für Türchen-Anordnung
- `.door-card` - Einzelne Türchen-Karte
- `.btn` - Button-Basisstil
- `.btn-primary`, `.btn-edit`, `.btn-delete` - Verschiedene Button-Typen
- `.empty-state` - Anzeige wenn keine Türchen vorhanden

## Farben und Konfiguration

Die Farben des Adventskalenders werden über Site Settings konfiguriert und automatisch ins Frontend injiziert:

### Via Site Settings (`config/sites/[sitename]/settings.yaml`)

```yaml
# Geschlossene Türchen
adventskalender.doorLockedColorStart: '#c31432'
adventskalender.doorLockedColorEnd: '#d32f2f'

# Offene Türchen
adventskalender.doorUnlockedColorStart: '#0f7c3c'
adventskalender.doorUnlockedColorEnd: '#2d5016'

# Spezielle Tage
adventskalender.specialChristmasColorStart: '#ffd700'
adventskalender.specialChristmasColorEnd: '#ff8c00'
adventskalender.specialNikolausColorStart: '#ff0000'
adventskalender.specialNikolausColorEnd: '#8b0000'
```

### CSS-Variablen im Frontend

Die Site Settings werden automatisch in CSS-Variablen umgewandelt:

```css
:root {
    --door-locked-start: /* doorLockedColorStart */;
    --door-locked-end: /* doorLockedColorEnd */;
    --door-unlocked-start: /* doorUnlockedColorStart */;
    --door-unlocked-end: /* doorUnlockedColorEnd */;
    --lightbox-accent: /* doorLockedColorStart */;
    /* weitere Farben... */
}
```

Diese Variablen beeinflussen:
- **Türchen-Hintergrund**: Farbverlauf für gesperrte/geöffnete Türchen
- **Lightbox**: Badge-, Button- und Gutschein-Farben
- **Buttons**: Musik-Toggle, Download-Buttons
- **Effekte**: Hover-Effekte und Glows

## Sicherheit

Das Plugin nutzt TYPO3s eingebaute Extbase-Funktionen:

- Automatic CSRF-Protection
- Action-based permissions
- Non-cacheable actions für Datenspeicherung

## Erweiterungsmöglichkeiten

### Türchen
- Benutzer-Authentifizierung hinzufügen
- Datei-Upload für Bilder/Videos ermöglichen
- Pagination implementieren
- Export-Funktion (PDF/CSV)
- Sortierbare Tabelle statt Gitter
- Bulk-Aktionen (z.B. mehrere löschen)

### Gutscheine
- Gutschein-Codes/Nummern hinzufügen
- PDF-Download für Gutscheine
- Druckversion mit besserer Formatierung
- Gültigkeit/Ablaufdatum für Gutscheine
- Kategorien/Tags für Gutscheine
- E-Mail-Versand von Gutscheinen
- Gutschein-Vorlagen speichern

## Fehlerbehandlung

- Automatisches Redirect bei Fehler
- Flash Messages für Benutzer-Feedback
- Validierung von erforderlichen Feldern

## Kompatibilität

- TYPO3 v13.4+
- PHP 8.2+
