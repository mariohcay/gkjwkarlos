<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_majelis');
        $this->load->model('m_jemaat');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = new DateTime('2021-8-18');
        date_time_set($date, 23, 59, 59);
        if(date('Y-m-d H:i:s') > date_format($date, 'Y-m-d H:i:s')){
            redirect("Dashboard/hasil");
        }
        if ($this->session->userdata('id')) {
            $this->m_jemaat->setBelumMemilih($this->session->userdata('id'));
        }
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

        $this->load->view('Templates/vHeader', $data);
        $this->load->view('Main/vPassword');
        $this->load->view('Templates/vFooter');
    }

    public function listNama()
    {
        $kelompok = $this->input->post('kelompok');

        $data = $this->m_jemaat->listNama($kelompok);

        echo json_encode($data);
    }

    public function submitPassword()
    {
        $password = $this->input->post('password');
        $kelompok = $this->input->post('kelompok');
        $nama = $this->input->post('nama');
        $jemaat = $this->m_jemaat->cekPassword($nama, $kelompok);
        $cek = password_verify($password, $jemaat['password']);
        if ($cek) {
            if ($jemaat['status'] === "Sudah Memilih") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Anda sudah melakukan pemilihan dan tidak dapat memilih lagi</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
                $this->session->set_flashdata(['kelompok' => $kelompok, 'nama' => $nama]);
                redirect('Dashboard');
            } else if ($jemaat['status'] === "Sedang Memilih") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Anda sedang melakukan pemilihan, coba lagi nanti</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
                $this->session->set_flashdata(['kelompok' => $kelompok, 'nama' => $nama]);
                redirect('Dashboard');
            } else {
                $this->session->set_userdata([
                    'id' => $jemaat['id'],
                    'kelompok' => $jemaat['kelompok']
                ]);
                redirect('Dashboard/pemilihan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <h6 class="my-auto">Maaf Password yang Anda masukkan salah</h6><i class="fa fa-exclamation-circle my-auto"></i></div>');
            $this->session->set_flashdata(['kelompok' => $kelompok, 'nama' => $nama]);
            redirect('Dashboard');
        }
    }

    public function pemilihan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = new DateTime('2021-8-18');
        date_time_set($date, 23, 59, 59);
        if(date('Y-m-d H:i:s') > date_format($date, 'Y-m-d H:i:s')){
            redirect("Dashboard/hasil");
        }
        if ($this->session->userdata('id')) {
            $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

            $this->m_jemaat->setSedangMemilih($this->session->userdata('id'));
            $kelompok = $this->session->userdata('kelompok');
            if (!$kelompok) {
                $kelompok = "Pendem";
            }
            $data['lakilaki'] = $this->m_majelis->daftarMajelisByJK($kelompok, "Laki-laki");
            $data['perempuan'] = $this->m_majelis->daftarMajelisByJK($kelompok, "Perempuan");
            $data['kelompok'] = $kelompok;

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vPemilihan');
            $this->load->view('Templates/vFooter');
        } else {
            redirect('Dashboard');
        }
    }

    public function konfirmasiPilihan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = new DateTime('2021-8-18');
        date_time_set($date, 23, 59, 59);
        if(date('Y-m-d H:i:s') > date_format($date, 'Y-m-d H:i:s')){
            redirect("Dashboard/hasil");
        }
        if ($this->session->userdata('id')) {
            $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';

            $pilihan = $this->input->post('majelis');
            $data['majelis'] = [];

            foreach ($pilihan as $p) {
                array_push($data['majelis'], $this->m_majelis->daftarMajelisByNoUrut($p));
            }
            $this->session->set_userdata('pilihan', $data['majelis']);

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vKonfirmasi');
            $this->load->view('Templates/vFooter');
        } else {
            redirect('Dashboard');
        }
    }

    public function submitPilihan()
    {
        $pilihan = $this->session->userdata('pilihan');
        foreach ($pilihan as $data) {
            $this->m_majelis->updateSuara($data['noUrut']);
        }
        $this->selesai();
    }

    public function selesai()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = new DateTime('2021-8-18');
        date_time_set($date, 23, 59, 59);
        if(date('Y-m-d H:i:s') > date_format($date, 'Y-m-d H:i:s')){
            redirect("Dashboard/hasil");
        }
        if ($this->session->userdata('id')) {
            $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';
            $id = $this->session->userdata('id');
            $this->m_jemaat->selesaiPilih($id);

            $this->session->sess_destroy();

            $this->load->view('Templates/vHeader', $data);
            $this->load->view('Main/vSelesai');
            $this->load->view('Templates/vFooter');
        } else {
            redirect('Dashboard');
        }
    }

    public function hasil()
    {
        $data['title'] = 'Pemilihan Majelis - GKJW Jemaat Karangploso';
        $data['karangploso'] = $this->m_majelis->jumlahSuara("Karangploso");
        $data['pendem'] = $this->m_majelis->jumlahSuara("Pendem");
        $data['gpa'] = $this->m_majelis->jumlahSuara("GPA");
        $data['babaan'] = $this->m_majelis->jumlahSuara("Babaan");
        $data['jumlahPemilihKarangploso'] = $this->m_jemaat->jumlahPemilih("Karangploso");
        $data['jumlahPemilihPendem'] = $this->m_jemaat->jumlahPemilih("Pendem");
        $data['jumlahPemilihGPA'] = $this->m_jemaat->jumlahPemilih("GPA");
        $data['jumlahPemilihBabaan'] = $this->m_jemaat->jumlahPemilih("Babaan");
        $data['jemaat'] = $this->m_jemaat->semuaJemaat();
        $data['sudah'] = $this->m_jemaat->sudahMemilih();

        $this->load->view('Templates/vHeader', $data);
        // $this->load->view('Main/vMainHeader');
        $this->load->view('Main/vHasilPublic');
        // $this->load->view('Main/vMainFooter');
        $this->load->view('Templates/vFooter');
    }
}
