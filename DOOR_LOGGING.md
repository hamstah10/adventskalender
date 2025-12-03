# Door Opening Logging Feature

## Overview
This feature logs every time an Advent calendar door is opened, capturing metadata about the event.

## Changes Made

### 1. Database Schema
Added new table `tx_adventskalender_domain_model_doorlog` to `ext_tables.sql`:
- `door` - Foreign key to the door record
- `opened_at` - Timestamp when the door was opened
- `ip_address` - Client IP address (supports proxies via X-Forwarded-For)
- `user_agent` - Browser user agent string
- `referer` - HTTP referer (referring page)

The table includes indexes on `door` and `opened_at` for efficient querying.

### 2. New Model
Created `Classes/Domain/Model/DoorLog.php`:
- Entity class for door log records
- Properties for all captured data
- Getter/setter methods

### 3. New Repository
Created `Classes/Domain/Repository/DoorLogRepository.php`:
- Handles persistence of door log records
- Method `findByDoor(int $doorUid)` - Get all logs for a specific door
- Method `findByDoorAndDateRange(int $doorUid, int $startTime, int $endTime)` - Get logs within a date range

### 4. Frontend Controller Updates
Updated `Classes/Controller/AdventskalenderController.php`:
- Injected `DoorLogRepository` dependency
- Added `logDoorOpening()` private method that creates and persists a DoorLog record
- Added `getClientIpAddress()` private method to extract the real IP address (handles proxies)
- Modified `showAction()` to call `logDoorOpening()` when a door is successfully opened

### 5. Management Controller Updates
Updated `Classes/Controller/ManagementController.php`:
- Injected `DoorLogRepository` dependency
- Added `logsAction()` - View all door opening logs
- Added `doorLogsAction(Door $door)` - View logs for a specific door

## Data Captured
When a door is opened, the following information is logged:

1. **Door UID** - Which door was opened
2. **Timestamp** - Exact date and time of opening
3. **IP Address** - Client's IP address with proper proxy support
4. **User Agent** - Browser and device information
5. **Referer** - Which page the user came from

## Usage

### Viewing Logs
Access the management interface to view logs at:
- `logs` action - Overview of all door openings
- `doorLogs` action - Logs for a specific door

### Querying Logs Programmatically
```php
// Get all logs for a specific door
$doorUid = 5;
$logs = $doorLogRepository->findByDoor($doorUid);

// Get logs for a date range
$doorUid = 5;
$startTime = strtotime('2024-12-01');
$endTime = strtotime('2024-12-31');
$logs = $doorLogRepository->findByDoorAndDateRange($doorUid, $startTime, $endTime);
```

## Database Migration
After these changes, run the TYPO3 database analyzer to create the new table:
1. Go to Admin Tools → Database Analyzer
2. Create new table: `tx_adventskalender_domain_model_doorlog`

## Security Considerations
- IP addresses are logged for analytics/tracking purposes
- User agents are logged but don't contain sensitive information
- Referrer headers are logged but are user-controlled and may be empty
- All data is stored in TYPO3's managed database with standard security controls
