# Adventskalender Management Plugin

## Übersicht

Das Management Plugin ist ein Frontend-Plugin, das es Benutzern ermöglicht, Adventskalender-Türchen direkt im Frontend zu verwalten und zu bearbeiten, ohne Zugang zum TYPO3 Backend zu benötigen.

## Features

- **Übersicht**: Zeige alle Adventskalender-Türchen in einer übersichtlichen Gitter-Ansicht
- **Bearbeiten**: Existierende Türchen aktualisieren (Titel, Beschreibung, Inhalt, Link, Status)
- **Erstellen**: Neue Türchen direkt im Frontend hinzufügen
- **Löschen**: Unwanted Türchen entfernen (mit Bestätigungsdialog)
- **Responsive Design**: Mobile-freundliche Benutzeroberfläche
- **Flash Messages**: Erfolgs- und Fehlermeldungen für Benutzeraktion

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

- `indexAction()` - Zeigt alle Türchen an
- `editAction()` - Zeigt Bearbeitungsformular für ein Türchen
- `updateAction()` - Speichert Änderungen
- `newAction()` - Zeigt Formular für neues Türchen
- `createAction()` - Erstellt ein neues Türchen
- `deleteAction()` - Löscht ein Türchen

### Templates

- `Index.html` - Übersichtsseite mit Türchen-Gitter
- `Edit.html` - Bearbeitungsformular
- `New.html` - Erstellungsformular

## Bearbeitbare Felder

- **Türchen-Nummer**: Tag des Adventskalenders (1-31)
- **Titel**: Überschrift des Türchens (erforderlich)
- **Kurzbeschreibung**: Kurzzusammenfassung
- **Hauptinhalt**: Ausführlicher Text/HTML
- **Link**: Optional externe URL
- **Status**: Aktiv/Inaktiv

## Code-Struktur

```
Classes/
├── Controller/
│   └── ManagementController.php

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
    └── New.html
```

## Design-Klassen und Styling

Das Plugin nutzt inline-CSS mit folgenden Hauptklassen:

- `.management-container` - Hauptcontainer
- `.doors-grid` - CSS-Grid für Türchen-Anordnung
- `.door-card` - Einzelne Türchen-Karte
- `.btn` - Button-Basisstil
- `.btn-primary`, `.btn-edit`, `.btn-delete` - Verschiedene Button-Typen
- `.empty-state` - Anzeige wenn keine Türchen vorhanden

## Sicherheit

Das Plugin nutzt TYPO3s eingebaute Extbase-Funktionen:

- Automatic CSRF-Protection
- Action-based permissions
- Non-cacheable actions für Datenspeicherung

## Erweiterungsmöglichkeiten

- Benutzer-Authentifizierung hinzufügen
- Datei-Upload für Bilder/Videos ermöglichen
- Pagination implementieren
- Export-Funktion (PDF/CSV)
- Sortierbare Tabelle statt Gitter
- Bulk-Aktionen (z.B. mehrere löschen)

## Fehlerbehandlung

- Automatisches Redirect bei Fehler
- Flash Messages für Benutzer-Feedback
- Validierung von erforderlichen Feldern

## Kompatibilität

- TYPO3 v13.4+
- PHP 8.2+
