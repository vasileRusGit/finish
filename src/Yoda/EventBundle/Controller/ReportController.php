<?php

namespace Yoda\EventBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Yoda\EventBundle\Reporting\EventReportManager;
use Yoda\EventBundle\Repository\EventRepository;

class ReportController extends Controller {

    /**
     * @Route("/events/report/recentlyUpdated.csv")
     */
    public function updatedEventsAction() {
        
        $eventReportManager = $this->container->get('event_report_manager');
        $content = $eventReportManager->getRecentlyUpdatedReport();

        $response = new Response($content);
        $response->headers->set('Content-type', 'text/csv');
        
        return $response;
    }

}
