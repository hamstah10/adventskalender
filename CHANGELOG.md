# Changelog

Alle großen Änderungen an diesem Projekt werden in dieser Datei dokumentiert.

## [2.0.0] - 2025-12-29

### ✨ New Features

#### Gutschein-System erweitert
- **Frontend-Gutschein-Verwaltung**: Gutscheine können jetzt komplett im Frontend angelegt und bearbeitet werden
- **Echtzeit-Vorschau**: Live-Vorschau wie der Gutschein auf der Website aussieht während der Erstellung
- **Mehrere Design-Templates**: Klassisch (Gold), Santa (Rot), Modern (Blau)
- **Direkter Türchen-Zuordnung**: Gutscheine werden direkt beim Erstellen einer Türchen zugeordnet
- **Gutschein-Übersicht**: Neue Spalte in der Türchen-Management-Ansicht zeigt zugehörige Gutscheine

#### Datenbankstruktur
- **Bidirektionale Door ↔ Voucher Relation**: 
  - Neue `door` Spalte in `tx_adventskalender_domain_model_voucher`
  - `foreign_field` Konfiguration in TCA für inline Relation
  - Voucher Model erhält `getDoor()` und `setDoor()` Methoden

#### Repository Verbesserungen
- **VoucherRepository**: Neue Klasse mit Soft-Delete Handling
- **DoorRepository**: Erweitert mit Soft-Delete Handling
- **Filtered Queries**: Gelöschte Datensätze werden automatisch gefiltert

#### Frontend Management Plugin
- **Gutscheine Tab**: Separate Tab-Navigation für Gutschein-Verwaltung
- **Gutschein-Liste**: Übersicht aller Gutscheine mit Tag, Design und Kontaktdaten
- **Gutschein-Formular**: Integriertes Formular mit Door-Selector und Live-Vorschau
- **Erweiterte Tabelle**: Türchen-Übersicht zeigt nun zugehörige Gutscheine

### 🔧 Bug Fixes

- ✅ Gelöschte Gutscheine werden im Frontend nicht mehr angezeigt
- ✅ Day-Feld wird nicht mehr mit 0 initialisiert
- ✅ Property Mapping funktioniert korrekt für alle Voucher-Felder
- ✅ Soft-Delete Records werden in Queries gefiltert

### 🛠️ Breaking Changes

- **Voucher.day entfernt**: Das `day` Feld wurde aus der Voucher-Klasse entfernt (verwendet jetzt die Door-Relation)
- **TCA Änderungen**: `day` Feld wurde aus Voucher TCA entfernt
- **Datenbankschema**: `day` Spalte existiert nicht mehr in tx_adventskalender_domain_model_voucher

### 📦 Database Migration

Neue Spalte wird automatisch erstellt:
```sql
ALTER TABLE tx_adventskalender_domain_model_voucher ADD door INT(11) UNSIGNED DEFAULT '0' NOT NULL;
```

### 📝 Documentation

- README.md erweitert mit neuem Gutschein-System
- Documentation.txt hinzugefügt mit Schnellstart und Troubleshooting
- CHANGELOG.md erstellt (diese Datei)

### 🔄 Migration von v1.x zu v2.0

1. Extension aktualisieren
2. Cache leeren: `php vendor/bin/typo3 cache:flush`
3. Datenbank-Struktur analysieren lassen im Backend (Maintenance → Analyze Database Structure)
4. Falls alte Gutscheine mit day-Feld vorhanden: Die neue Relation nutzen

### 💡 Bekannte Einschränkungen

- Gutschein-Designs sind aktuell auf 2 Varianten (Classic, Santa) beschränkt
- Download-Funktion benötigt html2canvas Library
- Echtzeit-Vorschau funktioniert nur mit JavaScript aktiviert

---

## [1.0.0] - 2024-12-01

### ✨ Initial Release

- Türchen-Verwaltung (1-24)
- Grundlegendes Gutschein-System
- Dashboard Widget
- Frontend Management Plugin (Basis)
- Multi-Language Support (DE, EN, RU)
- Konfigurierbare Farben via Site Sets
- Animation und Sound-Effekte
