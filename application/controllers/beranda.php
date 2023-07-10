<?php

class beranda extends CI_Controller{

    public function index()
    {    
         $data['bencana'] = $this->m_baba->tampil_data()->result();
         //memuat view
         $this->load->view('templates/beranda/sidebar');
         $this->load->view('templates/beranda/header');
         $this->load->view('templates/beranda/gempa', $data);
         $this->load->view('templates/beranda/footer');
    }
    public function detail($id){
        $this->load->model('m_baba');
        $detail = $this->m_baba->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/beranda/sidebar');
        $this->load->view('templates/beranda/header');
        $this->load->view('templates/beranda/detail', $data);
        $this->load->view('templates/beranda/footer');
    }
    public function cetak(){
        $data['bencana'] = $this->m_baba->tampil_data("tb_gempabumi")->result();
        $this->load->view('print_gempa', $data);
        }

    public function laporan_pdf(){
    
    $this->load->library('pdf');
    $data['bencana']= $this->m_baba->tampil_data('tb_gempabumi')->result();
    //load view laporan_pdf 
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan.pdf";
    $this->pdf->load_view('laporan_pdf', $data);

}
public function pdf(){
    //load library dompdf_gen 
    $this->load->library('pdf');
    //menampilkan data mahasiswa yang ada pada tabel
    $data['mahasiswa']= $this->m_mahasiswa->tampil_data('tb_mahasiswa')->result();
    //load view laporan_pdf 
    $this->load->view('laporan_pdf',$data);
    //menentukan ukuran kertas
    $paper_size = 'A4';
    //menentukan orientation kertas
    $orientation = 'landscape';
    $html = $this->output->get_output();
    //set(pengaturan) kertas
    $this->pdf->set_paper($paper_size, $orientation);
    //convert ke pdf
    $this->pdf->load_html($html);
    $this->pdf->render();
    //menentukan file export
    $this->pdf->stream("laporan_mahasiswa.pdf", array('Attachment' 
    =>0));
    }
}
