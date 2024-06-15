<?php

namespace Handlers;

use src\Database;
use src\Logger;
use src\Renderer;

class SearchHandler
{
    private $db;
    private $logger;
    private $renderer;

    public function __construct(Database $db, Logger $logger, Renderer $renderer)
    {
        $this->db       = $db;
        $this->logger   = $logger;
        $this->renderer = $renderer;
    }

    public function handleRequest($request)
    {
        $action = $this->determineAction($request);

        if ($action === 'process') {
            $this->processSearch($request['query']);
        } elseif ($action === 'showresults') {
            $this->showResults($request['searchid']);
        } else {
            $this->renderSearchForm();
        }
    }

    private function determineAction($request)
    {
        if (!empty($request['searchid'])) {
            return 'showresults';
        } elseif (!empty($request['q'])) {
            return 'process';
        }

        return 'form';
    }

    private function processSearch($query)
    {
        $results = $this->db->query('SELECT * FROM vb_post WHERE text LIKE :query', ['query' => '%' . $query . '%']);
        $this->renderSearchResults($results);
        $this->logger->log($query);
    }

    private function showResults($searchId)
    {
        $results = $this->db->query(
            'SELECT * FROM vb_searchresult WHERE searchid = :searchid', ['searchid' => $searchId]
        );
        $this->renderSearchResults($results);
    }

    private function renderSearchForm()
    {
        echo "<h2>Search in forum</h2><form method='get'><input name='q'></form>";
    }

    private function renderSearchResults($results)
    {
        foreach ($results as $row) {
            if ($row['forumid'] != 5) {
                $this->renderer->render_search_result($row);
            }
        }
    }
}