<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF { 
	function __construct() { 
		parent::__construct(); 
	}
	
	//Page header
    public function Header() {
        $this->SetY(15);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        // $this->Image('/assets/img/gsk_logo.jpg', 500);
        $this->Cell(0, 15, 'GSK Blood Bank', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
?>