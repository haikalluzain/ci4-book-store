<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CVController extends BaseController
{
    public function index()
    {
        $user_id = user_id();
        $basic_info = $this->basicInfo->where('user_id', $user_id)->get()->getFirstRow();
        if ($basic_info) {
            return view('pages/dashboard/cv/index');
        }
        return view('pages/dashboard/basic-info/index');
    }

    public function basic_info()
    {
        $user_id = user_id();
        $basic_info = $this->basicInfo->where('user_id', $user_id)->get()->getFirstRow();
        if ($basic_info) {
            return view('pages/dashboard/basic-info/edit', [
                'data' => $basic_info
            ]);
        }
        return view('pages/dashboard/basic-info/index');
    }

    public function store_basic_info()
    {
        $data = $this->request->getVar();
        $this->basicInfo->save([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'profession' => $data['profession'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'city' => $data['city'],
            'country' => $data['country'],
            // 'division' => $data['division'],
            'user_id' => user_id()
        ]);

        return redirect('education-new')->with('message', 'Basic Info created successfully');
    }

    public function update_basic_info($id)
    {
        $data = $this->request->getVar();
        $this->basicInfo->save([
            'id' => $id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'profession' => $data['profession'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'city' => $data['city'],
            'country' => $data['country'],
            // 'division' => $data['division'],
            'user_id' => user_id()
        ]);
        $educations = $this->education->where('user_id', user_id())->orderBy('created_at', 'DESC')->get()->getResult();
        if (count($educations)) {
            return redirect('educations')->with('message', 'Basic Info updated successfully');
        }
        return redirect('education-new')->with('message', 'Basic Info updated successfully');
    }

    public function exportExcel()
    {
        $user_id = user_id();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', "Curriculum Vitae");
        $sheet->mergeCells('A1:D1');

        $sheet->getStyle('A1')->getFont()->setBold(true);

        $basic_info = $this->basicInfo->where('user_id', $user_id)->get()->getFirstRow();
        $career = $this->careerObject->where('user_id', $user_id)->get()->getFirstRow();
        $educations = $this->education->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $works = $this->work->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();
        $certificates = $this->certificate->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get()->getResult();

        // Basic Info
        $sheet->setCellValue('A3', $basic_info->first_name . " " . $basic_info->last_name);
        $sheet->setCellValue('A4', $basic_info->profession);
        // $sheet->setCellValue('A5', $basic_info->city);
        // $sheet->setCellValue('A6', $basic_info->division);

        $sheet->setCellValue('D3', "Email");
        $sheet->setCellValue('D4', "Website");
        $sheet->setCellValue('D5', "Phone");

        $sheet->setCellValue('E3', $basic_info->email);
        $sheet->setCellValue('E4', $basic_info->website);
        $sheet->setCellValue('E5', $basic_info->phone);

        // Summary
        $sheet->setCellValue('A9', "Summary");
        $sheet->getStyle('A9')->getFont()->setBold(true);
        $sheet->setCellValue('A10', $career->career_object);

        // Education
        $sheet->setCellValue('A12', "Education");
        $sheet->getStyle('A12')->getFont()->setBold(true);

        $sheet->setCellValue('A13', "No");
        $sheet->setCellValue('B13', "Degree / Diploma");
        $sheet->setCellValue('C13', "Institue");
        $sheet->setCellValue('D13', "Year");

        $no = 1;
        $numRow = 14;

        foreach ($educations as $education) {
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $education->degree);
            $sheet->setCellValue('C' . $numRow, $education->institute);
            $sheet->setCellValue('D' . $numRow, $education->year);

            $no++;
            $numRow++;
        }

        // Work Experience
        $numRow += 2;
        $sheet->setCellValue('A'. $numRow, "Work Experience");
        $sheet->getStyle('A'. $numRow)->getFont()->setBold(true);

        $numRow += 1;

        $sheet->setCellValue('A' . $numRow, "No");
        $sheet->setCellValue('B' . $numRow, "Company Name");
        $sheet->setCellValue('C' . $numRow, "Position");
        $sheet->setCellValue('D' . $numRow, "Year");

        $no = 1;
        $numRow += 1;

        foreach ($works as $work) {
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $work->company_name);
            $sheet->setCellValue('C' . $numRow, $work->position);
            $sheet->setCellValue('D' . $numRow, $work->year);

            $no++;
            $numRow++;
        }

        // Certificates
        $numRow += 2;
        $sheet->setCellValue('A'. $numRow, "Certificates");
        $sheet->getStyle('A'. $numRow)->getFont()->setBold(true);

        $numRow += 1;

        $sheet->setCellValue('A' . $numRow, "No");
        $sheet->setCellValue('B' . $numRow, "Certification");
        $sheet->setCellValue('C' . $numRow, "Organization");
        $sheet->setCellValue('D' . $numRow, "Year");

        $no = 1;
        $numRow += 1;

        foreach ($certificates as $cer) {
            $sheet->setCellValue('A' . $numRow, $no);
            $sheet->setCellValue('B' . $numRow, $cer->certificate_name);
            $sheet->setCellValue('C' . $numRow, $cer->organization);
            $sheet->setCellValue('D' . $numRow, $cer->year);

            $no++;
            $numRow++;
        }

        $filename = 'CV-' . $basic_info->first_name . ' ' . $basic_info->last_name;

        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setTitle($filename);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
