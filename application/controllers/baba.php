<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class baba extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}
    
    public function index()
    {    
         $data['bencana'] = $this->m_baba->tampil_data()->result();
         //memuat view
         $this->load->view('templates/sidebar');
         $this->load->view('templates/header');
         $this->load->view('gempa', $data);
         $this->load->view('templates/footer');
    }
    
    //fungsi untuk menambah data
    public function tambah_aksi(){
        $wilayah = $this->input->post('wilayah');
        $skala_ritcher        = $this->input->post('skala_ritcher');
        $waktu      = $this->input->post('waktu');
        $tanggal       = $this->input->post('tanggal');
        $korban      = $this->input->post('korban');
        $kedalaman        = $this->input->post('kedalaman');
        //data yang dikirim harus bertipe array
        $data = array(
            'wilayah'       => $wilayah,
            'skala_ritcher' => $skala_ritcher,
            'waktu'         => $waktu,
            'tanggal'       => $tanggal,
            'korban'        => $korban,
            'kedalaman'     => $kedalaman,

        );

        //method yang nanti akan digunakan di model
        //untuk memasukan data ke database
        $this->m_baba->input_data($data, 'tb_gempabumi');
        redirect('baba/index');

        
    }
    //fungsi untuk menghapus data
    public function hapus($id)
        {
            $where = array('id'=>$id);
            //method yang nanti akan digunakan di model
            //untuk menghapus data dari database
            $this->m_baba->hapus_data($where,'tb_gempabumi');
            redirect('baba/index');
        }
    //fungsi untuk merubah data
    public function edit($id){
            $where = array('id'=>$id);
            //method yang nanti akan digunakan di model
            //untuk merubah data dari database
            $data['bencana'] = $this->m_baba->edit_data($where,'tb_gempabumi')->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('edit', $data);
            $this->load->view('templates/footer');
    }
    //fungsi untuk memperbaharui/mengupdate data dari database
    public function update(){
            $id= $this->input->post('id');
            $wilayah = $this->input->post('wilayah');
            $skala_ritcher = $this->input->post('skala_ritcher');
            $waktu = $this->input->post('waktu');
            $tanggal = $this->input->post('tanggal');
            $korban = $this->input->post('korban');
            $kedalaman = $this->input->post('kedalaman');

            $data = array(
                'wilayah'       => $wilayah,
                'skala_ritcher'     => $skala_ritcher,
                'waktu'             => $waktu,
                'tanggal'           => $tanggal,
                'korban'            => $korban,
                'kedalaman'         => $kedalaman,

            );
            $where = array(
                    'id' => $id
                    );
         //method yang nanti akan digunakan di model
        //untuk merubah mengapdate data dari database
        $this->m_baba->update_data($where,$data,'tb_gempabumi');
        redirect('baba/index');
    }
    //fungsi untuk menampilkan detail data
    public function detail($id){
        $this->load->model('m_baba');
        $detail = $this->m_baba->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/sidebar');
        $this->load->view('templates/header');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
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
    
    public function excel(){
        $data['bencana'] = $this->m_baba->tampil_data('tb_gempa')->result();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A','G') as $columnID){
            $spreadsheet ->getActiveSheet()->getColumnDimension($columnID)->setAutosize(true);
        }
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'WILAYAH');
        $sheet->setCellValue('C1', 'SKALA RITCHER');
        $sheet->setCellValue('D1', 'WAKTU');
        $sheet->setCellValue('E1', 'TANGGAL');
        $sheet->setCellValue('F1', 'KORBAN');
        $sheet->setCellValue('G1', 'KEDALAMAN');
        $baris = 2;
        $no = 1;
        foreach ($data['bencana'] as $bcn){
        $sheet->setCellValue('A'. $baris, $no++);
        $sheet->setCellValue('B'. $baris, $bcn->wilayah);
        $sheet->setCellValue('C'. $baris, $bcn->skala_ritcher);
        $sheet->setCellValue('D'. $baris, $bcn->waktu);
        $sheet->setCellValue('E'. $baris, $bcn->tanggal);
        $sheet->setCellValue('F'. $baris, $bcn->korban);
        $sheet->setCellValue('G'. $baris, $bcn->kedalaman);
        $baris++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'data_gempa.xlsx'; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$fileName. '"');
		$writer->save('php://output');
}
}