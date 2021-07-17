<?php
if(!function_exists('tgl_indo'))
{
    function tgl_indo($tanggal, $namaHari = false)
    {
        $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
            
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        $tgl_indo = $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];

        if ($namaHari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        return $tgl_indo;
    }
    
}

if(!function_exists('time_indo'))
{
    function time_indo($time)
    {
        $pecahkan = explode(':', $time);
        return $pecahkan[0].'.'.$pecahkan['1'];
    }
}
?>