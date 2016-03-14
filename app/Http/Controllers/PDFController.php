<?php

namespace Alifarmat\Http\Controllers;

use Illuminate\Http\Request;

use Alifarmat\Http\Requests;
use PDF; // at the top of the file
class PDFController extends Controller
{
  public function github (){
    //PDF::setHeaderCallback(function($pdf){})
    //PDF::setFooterCallback(function($pdf){})
    PDF::setFooterCallback(function($pdf){$pdf->setY(-25);$pdf->SetFont('helvetica', 'I', 8); $pdf->writeHTMLCell('', 0, '', '', 'No Pagina', 1, 0, 0, true, 'C', true);});
    PDF::SetTitle('Hello World');
    PDF::AddPage('L',array(355.6, 215.9));
    PDF::writeHTMLCell(8, 0, '', '', 'No', 1, 0, 0, true, 'C', true);
    PDF::Write(0, 'Hello World');
    PDF::AddPage('L',array(355.6, 215.9));
    PDF::writeHTMLCell(8, 0, '', '', 'No', 1, 0, 0, true, 'C', true);
    PDF::Write(0, 'Hello World');
    PDF::Output('hello_world.pdf');
/*    for ($i = 0; $i < 5; $i++) {
        PDF::SetTitle('Hello World'.$i);
        PDF::AddPage();
        PDF::Write(0, 'Hello World'.$i);
        PDF::Output(public_path('hello_world' . $i . '.pdf'), 'F');
        PDF::reset();
    }*/
    //return \PDF::loadFile('http://roses.bicdev.com')->stream('github.pdf');
    //return \PDF::loadView('ruta.vista', $datos)->download('nombre-archivo.pdf');
  }
}
