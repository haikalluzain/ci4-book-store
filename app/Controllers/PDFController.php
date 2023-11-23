<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends BaseController
{
    public function index()
    {
        $user_id = user_id();
        $career = $this->careerObject->where('user_id', $user_id)->get()->getFirstRow();
        $basic_info = $this->basicInfo->where('user_id', $user_id)->get()->getFirstRow();
        $educations = $this->education->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $works = $this->work->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $certificates = $this->certificate->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        return view('pages/dashboard/pdf/index', [
            'basic_info' => $basic_info,
            'career' => $career,
            'educations' => $educations,
            'works' => $works,
            'certificates' => $certificates
        ]);
    }

    public function downloadPdf()
    {  
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $user_id = user_id();
        $career = $this->careerObject->where('user_id', $user_id)->get()->getFirstRow();
        $basic_info = $this->basicInfo->where('user_id', $user_id)->get()->getFirstRow();
        $educations = $this->education->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $works = $this->work->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $certificates = $this->certificate->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $html = view('pages/dashboard/pdf/index', [
            'basic_info' => $basic_info,
            'career' => $career,
            'educations' => $educations,
            'works' => $works,
            'certificates' => $certificates
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait', true);
        $dompdf->render();
        $filename = 'CV-'.$basic_info->first_name. " " . $basic_info->last_name . '.pdf';
        $dompdf->stream($filename, [
            // 'Attachment' => false
        ]);
    }
}
