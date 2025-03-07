<?php
namespace Controllers;

use PDO;
use Models\ReportModel;

class ReportController extends Controller
{
    public function __construct(PDO $database)
    {
        parent::__construct($database);
    }

    public function create_report_when_to_assign($ticket_id){

        $ReportModel = new ReportModel($this->db);
        $result = $ReportModel->find_by_ticketid($ticket_id);
        if($result == false ){
            $ReportModel->create(["title","content","ticket_id"],'', '', $ticket_id);
        }
       
        header("Location: /litemvc/admin");

    }
}