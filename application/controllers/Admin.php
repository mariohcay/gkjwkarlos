<?php

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jemaat');
        $this->load->model('m_majelis');
    }

    public function convert()
    {
        $jemaat = $this->m_jemaat->semuaJemaat();
        foreach ($jemaat as $data) {
            echo password_hash($data['password'], PASSWORD_BCRYPT) . "</br>";
        }
    }

    public function reset()
    {
        if (!$this->session->userdata('id')) {
            redirect('Admin');
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Admin/vResetPassword');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }

    public function submitResetPassword()
    {
        $password = $this->input->post('password');
        $cek = password_verify($password, '$2a$12$76QLDX1Zask2M.AMYbcHPOQbFSYYvvu1s.PW4U.4EVH9K0eN7RmGa');
        if ($cek) {
            $this->m_jemaat->reset();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Seluruh sistem telah berhasil direset</h6><i class="fa fa-check my-auto"></i></div>');
            redirect('Admin/kehadiran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Password yang Anda masukkan salah</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Admin/reset');
        }
    }

    public function index()
    {
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

        if ($this->session->userdata('id')) {
            redirect('Admin/kehadiran');
        }

        $this->load->view('Templates/vHeader', $data);
        $this->load->view('Admin/vAdminPassword');
        $this->load->view('Templates/vFooter');
    }

    public function kehadiran()
    {
        if (!$this->session->userdata('id')) {
            redirect('Admin');
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';
        $data['jemaat'] = $this->m_jemaat->semuaJemaat();
        $data['sudah'] = $this->m_jemaat->sudahMemilih();
        $data['belum'] = $this->m_jemaat->belumMemilih();
        $data['sedang'] = $this->m_jemaat->sedangMemilih();

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Admin/vKehadiran');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }

    public function submitPassword()
    {
        $password = $this->input->post('password');
        $cek = password_verify($password, '$2a$12$IQ.lUEqyoW3IAKOmwySzbO1W1rCUIbcH40SxISiNH504thIWhMy16');
        if ($cek) {
            $this->session->set_userdata([
                'id' => 'admin',
            ]);
            redirect('Admin/kehadiran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Password yang Anda masukkan salah</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Admin');
        }
    }

    public function resetStatus($id, $nama)
    {
        $this->m_jemaat->resetStatus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Status pemilih <b>' . urldecode($nama) . '</b> berhasil direset</h6><i class="fa fa-check my-auto"></i></div>');
        redirect('Admin/kehadiran');
    }

    public function hasil()
    {
        if (!$this->session->userdata('id')) {
            redirect('Admin');
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';
        $data['karangploso'] = $this->m_majelis->jumlahSuara("Karangploso");
        $data['pendem'] = $this->m_majelis->jumlahSuara("Pendem");
        $data['gpa'] = $this->m_majelis->jumlahSuara("GPA");
        $data['babaan'] = $this->m_majelis->jumlahSuara("Babaan");
        $data['jumlahPemilihKarangploso'] = $this->m_jemaat->jumlahPemilih("Karangploso");
        $data['jumlahPemilihPendem'] = $this->m_jemaat->jumlahPemilih("Pendem");
        $data['jumlahPemilihGPA'] = $this->m_jemaat->jumlahPemilih("GPA");
        $data['jumlahPemilihBabaan'] = $this->m_jemaat->jumlahPemilih("Babaan");

        $this->load->view('Templates/vHeader', $data);
        $this->load->view('Admin/vHasil');
        $this->load->view('Templates/vFooter');
    }

    public function exportExcel()
    {
        if (!$this->session->userdata('id')) {
            redirect('Admin');
        }
        $karangploso = $this->m_majelis->jumlahSuara("Karangploso");
        $pendem = $this->m_majelis->jumlahSuara("Pendem");
        $gpa = $this->m_majelis->jumlahSuara("GPA");
        $babaan = $this->m_majelis->jumlahSuara("Babaan");

        require('./vendor/autoload.php');

        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load('template.xlsx');

        $spreadsheet->getProperties()->setCreator('mariohcay')
            ->setTitle('Hasil Pemilu Majelis Jemaat GKJW Karangploso');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $row = 2;
        foreach ($karangploso as $data) {
            $spreadsheet->setActiveSheetIndex(0);
            $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, ($row - 1))
                ->setCellValue('B' . $row, $data['nama'])
                ->setCellValue('C' . $row, $data['kelompok'])
                ->setCellValue('D' . $row, $data['suara']);
            $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
            ++$row;
        }

        $row = 2;
        foreach ($pendem as $data) {
            $spreadsheet->setActiveSheetIndex(1);
            $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
            $spreadsheet->setActiveSheetIndex(1)
                ->setCellValue('A' . $row, ($row - 1))
                ->setCellValue('B' . $row, $data['nama'])
                ->setCellValue('C' . $row, $data['kelompok'])
                ->setCellValue('D' . $row, $data['suara']);
            $spreadsheet->setActiveSheetIndex(1)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
            ++$row;
        }

        $row = 2;
        foreach ($gpa as $data) {
            $spreadsheet->setActiveSheetIndex(2);
            $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
            $spreadsheet->setActiveSheetIndex(2)
                ->setCellValue('A' . $row, ($row - 1))
                ->setCellValue('B' . $row, $data['nama'])
                ->setCellValue('C' . $row, $data['kelompok'])
                ->setCellValue('D' . $row, $data['suara']);
            $spreadsheet->setActiveSheetIndex(2)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
            ++$row;
        }

        $row = 2;
        foreach ($babaan as $data) {
            $spreadsheet->setActiveSheetIndex(3);
            $spreadsheet->getActiveSheet()->insertNewRowBefore($row + 1, 1);
            $spreadsheet->setActiveSheetIndex(3)
                ->setCellValue('A' . $row, ($row - 1))
                ->setCellValue('B' . $row, $data['nama'])
                ->setCellValue('C' . $row, $data['kelompok'])
                ->setCellValue('D' . $row, $data['suara']);
            $spreadsheet->setActiveSheetIndex(3)->getStyle('A' . $row . ':D' . $row)->applyFromArray($styleArray);
            ++$row;
        }

        $spreadsheet->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Hasil Pemilu Majelis Jemaat GKJW Karangploso.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
