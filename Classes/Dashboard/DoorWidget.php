<?php

declare(strict_types=1);

namespace Hamstah\Adventskalender\Dashboard;

use TYPO3\CMS\Dashboard\Widgets\WidgetInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;

class DoorWidget implements WidgetInterface
{
    private string $title = 'Adventskalender - Türen';
    private string $description = 'Übersicht der angelegten Adventskalender-Türen';

    public function __construct(
        private readonly WidgetConfigurationInterface $configuration,
        private readonly ConnectionPool $connectionPool
    ) {}

    public function renderWidgetContent(): string
    {
        try {
            $connection = $this->connectionPool->getConnectionForTable('tx_adventskalender_domain_model_door');
            $queryBuilder = $connection->createQueryBuilder();
            $doors = $queryBuilder
                ->select('*')
                ->from('tx_adventskalender_domain_model_door')
                ->where($queryBuilder->expr()->eq('deleted', 0))
                ->orderBy('day', 'ASC')
                ->executeQuery()
                ->fetchAllAssociative();
        } catch (\Exception $e) {
            return '<div class="adventskalender-widget"><p class="no-data">Fehler beim Abrufen der Türen: ' . htmlspecialchars($e->getMessage()) . '</p></div>';
        }

        $totalDoors = count($doors);
        
        // Zähle aktivierte Türen
        $activeDoors = 0;
        $doorsByDay = [];
        
        foreach ($doors as $door) {
            if ($door['hidden'] === 0) {
                $activeDoors++;
            }
            $day = $door['day'];
            if (!isset($doorsByDay[$day])) {
                $doorsByDay[$day] = [];
            }
            $doorsByDay[$day][] = $door;
        }
        
        ksort($doorsByDay);
        
        $html = '<div class="adventskalender-widget">';
        $html .= '<div class="widget-stats">';
        $html .= '<div class="stat-item">';
        $html .= '<span class="stat-label">Gesamt Türen:</span>';
        $html .= '<span class="stat-value">' . $totalDoors . '</span>';
        $html .= '</div>';
        $html .= '<div class="stat-item">';
        $html .= '<span class="stat-label">Aktiviert:</span>';
        $html .= '<span class="stat-value">' . $activeDoors . '</span>';
        $html .= '</div>';
        $html .= '</div>';
        
        if ($totalDoors > 0) {
            $html .= '<div class="doors-list">';
            $html .= '<h4>Türen übersicht:</h4>';
            $html .= '<ul>';
            
            foreach ($doorsByDay as $day => $doorsForDay) {
                foreach ($doorsForDay as $door) {
                    $status = $door['hidden'] === 0 ? '✓' : '✗';
                    $html .= '<li>';
                    $html .= '<strong>Tag ' . $day . ':</strong> ' . htmlspecialchars($door['title']);
                    $html .= ' <span class="status">' . $status . '</span>';
                    $html .= '</li>';
                }
            }
            
            $html .= '</ul>';
            $html .= '</div>';
        } else {
            $html .= '<p class="no-data">Noch keine Türen angelegt.</p>';
        }
        
        $html .= '</div>';
        
        return $html;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIdentifier(): string
    {
        return 'adventskalender_door_widget';
    }

    public function getIconIdentifier(): string
    {
        return 'module-adventskalender';
    }

    public function getOptions(): array
    {
        return [];
    }
}
