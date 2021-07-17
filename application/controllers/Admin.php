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

    public function index()
    {
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

        if ($this->session->userdata('id')){
            redirect('Admin/kehadiran');
        }

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Admin/vAdminPassword');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }

        public function kehadiran(){
        if (!$this->session->userdata('id')){
            redirect('Admin');
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';
        $data['sudah'] = $this->m_jemaat->sudahMemilih();
        $data['belum'] = $this->m_jemaat->belumMemilih();

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Admin/vKehadiran');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }

    public function submitPassword()
    {
        $password = $this->input->post('password');
        if ($password === "admin@gkjwkarlos21") {
            
                $this->session->set_userdata([
                    'id' => 'admin',
                ]);
                redirect('Admin/kehadiran');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Password yang Anda masukkan salah</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
            redirect('Admin');
        }
    }

    // public function tambahJemaat()
    // {
    //     $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso Periode xxxx/xxxx';
    //     $data['jumlah'] = count($this->m_jemaat->semuaJemaat());

    //     $this->load->view('Templates/vHeader', $data);
    //     $this->load->view('Admin/vTambahJemaat');
    //     $this->load->view('Templates/vFooter');
    // }

    // public function submitTambahJemaat(){
    //     $nama = $this->input->post('nama');
    //     $data = [
    //         'id' => $this->input->post('id'),
    //         'nama' => $this->input->post('nama'),
    //         'kelompok' => $this->input->post('kelompok')
    //     ];
    //     $this->m_jemaat->tambahJemaat($data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert">
    //     <i class="fa fa-check my-auto"></i>
    //     </i> <h6 class="my-auto">Data jemaat <b>' . $nama . '</b> berhasil ditambahkan</h6>
    //     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
    //     redirect('Admin');
    // }

    // public function submitHadir($id)
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $password = date('His');
    //     $jemaat = $this->m_jemaat->ambilJemaat($id);
    //     $this->m_jemaat->updateKehadiran($id, $password);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success d-flex justify-content-between" role="alert">
    //     <i class="fa fa-check my-auto"></i>
    //     </i> <h6 class="my-auto">Terima kasih <b>' . $jemaat['nama'] . '</b>, silahkan menunggu giliran, password Anda: <b>' . $password . '</b></h6>
    //     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
    //     redirect('Admin');
    // }

    public function hasil()
    {
        if (!$this->session->userdata('id')){
            redirect('Admin');
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso Periode xxxx/xxxx';
        $data['karangploso'] = $this->m_majelis->jumlahSuara("Karangploso");
        $data['pendem'] = $this->m_majelis->jumlahSuara("Pendem");
        $data['gpa'] = $this->m_majelis->jumlahSuara("GPA");
        $data['babaan'] = $this->m_majelis->jumlahSuara("Babaan");
        $data['jumlahPemilihKarangploso'] = $this->m_jemaat->jumlahPemilih("Karangploso");
        $data['jumlahPemilihPendem'] = $this->m_jemaat->jumlahPemilih("Pendem");
        $data['jumlahPemilihGPA'] = $this->m_jemaat->jumlahPemilih("GPA");
        $data['jumlahPemilihBabaan'] = $this->m_jemaat->jumlahPemilih("Babaan");

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Admin/vHasil');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }
 
    public function exportExcel()
    {
        if (!$this->session->userdata('id')){
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
