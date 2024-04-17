<?php

namespace App\Services;

class ReportingService
{

    private ResultsService $resultsService;
    private RaceService $raceService;

    public function __construct(
        ResultsService $resultsService,
        RaceService    $raceService
    )
    {
        $this->resultsService = $resultsService;
        $this->raceService = $raceService;
    }


    /*
     * get latest race winnners
     */
    public function getLatestWinners()
    {
        return $this->resultsService->listResults();
    }


    public function raceDetailsReport()
    {
        return $this->raceService->list();
    }


}
