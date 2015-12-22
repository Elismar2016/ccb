<?php

        include_once('class/tcpdf/tcpdf.php');
        include_once('class/PHPJasperXML.inc.php');
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//        include_once ('setting.php');

class ReportModel extends CI_Model {

    function ReportModel() {
        parent::__construct();
    }
    
    function specific($lendingid) {
        
        $xml = simplexml_load_file('C:/wamp/www/ccb/application/reports/specificloan.jrxml');
        
        $report = new PHPJasperXML();
        $report->debugsql = false;
        $report->arrayParameter = array("id" => $lendingid);
        $report->xml_dismantle($xml);
        
        $report->transferDBtoArray('localhost', 'root', 'ccbpe2015', 'ccb');
        $report->outpage("D");
    }

}
