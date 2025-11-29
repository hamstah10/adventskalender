-- Aktualisiert alle Türchen mit fehlenden oder ungültigen Tag-Nummern
-- Weist automatisch Tage 1-24 zu basierend auf der Reihenfolge

-- Zuerst alle mit day = 0 auf eine Liste überprüfen
SELECT uid, title, day FROM tx_adventskalender_domain_model_door WHERE day = 0 OR day IS NULL ORDER BY uid;

-- Option 1: Alle auf day = 1 setzen (sollte später manuell korrigiert werden)
UPDATE tx_adventskalender_domain_model_door SET day = 1 WHERE day = 0 OR day IS NULL;

-- Alternativ: Falls man verschiedene Tage automatisch zuweisen möchte:
-- UPDATE tx_adventskalender_domain_model_door SET day = LEAST(uid, 24) WHERE day = 0 OR day IS NULL;
