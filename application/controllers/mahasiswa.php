<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function index()
	{
		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('template/footer');
	}
	public function tambah()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa');
		$this->load->view('template/footer');
	}
	public function tambah_aksi()
	{
		$nama		= $this->input->post('nama');
		$nim		= $this->input->post('nim');
		$tgl_lahir 	= $this->input->post('tgl_lahir');
		$jurusan 	= $this->input->post('jurusan');
		$alamat 	= $this->input->post('alamat');
		$email 		= $this->input->post('email');
		$no_telp 	= $this->input->post('no_telp');
		$foto		= $_FILES['foto'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				echo "Upload Gagal";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nama' => $nama,
			'nim' => $nim,
			'tgl_lahir' => $tgl_lahir,
			'jurusan' => $jurusan,
			'alamat' => $alamat,
			'email' => $email,
			'no_telp' => $no_telp,
			'foto' => $foto,
		);
		$this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Ditambahkan </div>');
		redirect('mahasiswa/index');
	}
	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->m_mahasiswa->hapus_data($where, 'tb_mahasiswa');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Dihapus </div>');
		redirect('mahasiswa/index');
	}
	public function edit($id)
	{
		$where = array('id' => $id);
		$data['mahasiswa'] = $this->m_mahasiswa->edit_data($where, 'tb_mahasiswa')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('edit', $data);
		$this->load->view('template/footer');
	}
	public function update()
	{
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$nim		= $this->input->post('nim');
		$tgl_lahir 	= $this->input->post('tgl_lahir');
		$jurusan 	= $this->input->post('jurusan');
		$alamat 	= $this->input->post('alamat');
		$email		= $this->input->post('email');
		$no_telp 	= $this->input->post('no_telp');
		$foto = $_FILES['foto'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				echo "Upload Gagal";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nama' => $nama,
			'nim' => $nim,
			'tgl_lahir' => $tgl_lahir,
			'jurusan' => $jurusan,
			'alamat' => $alamat,
			'email' => $email,
			'no_telp' => $no_telp,
			'foto' => $foto,
		);
		$where = array(
			'id' => $id
		);
		$this->m_mahasiswa->update_data($where, $data, 'tb_mahasiswa');
		$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		Data Berhasil Diubah </div>');
		redirect('mahasiswa/index');
	}
	public function detail($id)
	{
		$this->load->model('m_mahasiswa');
		$detail = $this->m_mahasiswa->detail_data($id);
		$data['detail'] = $detail;
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('detail', $data);
		$this->load->view('template/footer');
	}
	public function print()
	{
		$data['mahasiswa'] = $this->m_mahasiswa->tampil_data("tb_mahasiswa")->result();
		$this->load->view('print_mahasiswa', $data);
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['mahasiswa'] = $this->m_mahasiswa->get_keyword($keyword);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('template/footer');
	}
}
