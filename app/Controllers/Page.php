<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use App\Models\KaryawanModel;
use App\Models\AbsensiModel;
use App\Models\JabatanModel;


class Page extends BaseController
{
	protected $karyawanModel;
	protected $absensiModel;
	protected $jabatanModel;
	public function __construct()
	{
		$this->karyawanModel = new KaryawanModel();
		$this->absensiModel = new AbsensiModel();
		$this->jabatanModel = new JabatanModel();
	}
	//karyawan
	public function index()
	{
		$data = [
			'title'   => "Data Karyawan",
			'karyawanActive' => "active",
			'jabatan' => $this->jabatanModel->findAll(),
			'karyawan' => $this->karyawanModel->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan')->findAll()
		];
		return view('v_karyawan', $data);
	}
	public function tambahkaryawan()
	{
		$this->karyawanModel->save([
			'nomor_pegawai' => $this->request->getVar('id'),
			'nama' => $this->request->getVar('nama'),
			'id_jabatan' => $this->request->getVar('jabatan'),
		]);
		return redirect()->to('/karyawan ');
	}

	public function editkaryawan($id)
	{
		$data = [
			'title'   => "Data Karyawan",
			'jabatan' => $this->jabatanModel->findAll(),
			'karyawanid' => $this->karyawanModel->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan')->find($id)
		];
		return view('v_editkaryawan', $data);
	}

	public function updatekaryawan($id)
	{
		$this->karyawanModel->update($id, [
			'nama' => $this->request->getVar('namakaryawan'),
			'nomor_pegawai' => $this->request->getVar('nomorpegawai'),
			'id_jabatan' => $this->request->getVar('jabatan'),
		]);
		session()->setFlashdata('message', 'Update Data Pegawai Berhasil');
		return redirect()->to('/karyawan');
	}
	public function deletekaryawan($id)
	{
		$this->karyawanModel->delete($id);
		return redirect()->to('/karyawan');
	}
	//jabatan
	public function jabatan()
	{
		$data = [
			'title'   => "Data Jabatan",
			'jabatanActive' => "active",
			'jabatan' => $this->jabatanModel->findAll()
		];
		return view('v_jabatan', $data);
	}
	public function editjabatan($id)
	{
		$data = [
			'title'   => "Edit Jabatan",
			'jabatan' => $this->jabatanModel->find($id)
		];
		return view('v_editjabatan', $data);
	}
	public function updatejabatan($id)
	{
		$this->jabatanModel->update($id, [
			'nama_jabatan' => $this->request->getVar('namajabatan'),
			'nominal_gaji' => $this->request->getVar('nominal'),
		]);
		session()->setFlashdata('message', 'Update Data Pegawai Berhasil');
		return redirect()->to('/jabatan');
	}
	public function deletejabatan($id)
	{
		$this->jabatanModel->delete($id);
		return redirect()->to('/jabatan');
	}
	
	//absensi
	public function absensi()
	{
		$data = [
			'title'   => "Data Absensi",
			'absensiActive' => "active",
			'karyawan' => $this->karyawanModel->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan')->findAll(),
			'absen' => $this->absensiModel->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_absensi.id_karyawan')->findAll()
		];
		return view('v_absensi', $data);
	}
	public function inputabsen()
	{
		$this->absensiModel->save([
			'id_karyawan' => $this->request->getVar('data_pegawai'),
			'masuk' => $this->request->getVar('masuk'),
			'izin' => $this->request->getVar('izin'),
			'sakit' => $this->request->getVar('sakit')
		]);
		$id = $this->request->getVar('data_pegawai');
		$masuk = $this->request->getVar('masuk');
		$id2 = $this->karyawanModel->where('id_karyawan', $id)->findColumn('id_jabatan');
		$nominal = $this->jabatanModel->where('id_jabatan', $id2)->findColumn('nominal_gaji');
		$gaji = ((int)$nominal[0] * $masuk);

		$this->karyawanModel->update($id, [
			'gaji' => $this->request = $gaji
		]);

		return redirect()->to('/absensi');
	}
	public function printgaji($id, $id_absensi)
	{
		$data = [
			'title'   => "Data Absensi",
			'absensiActive' => "active",
			'karyawan' => $this->karyawanModel->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan')->find($id),
			'absen' => $this->absensiModel->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_absensi.id_karyawan')->find($id_absensi)
		];
		$dompdf = new Dompdf();

		$dompdf->loadHtml(view('v_pdf', $data));
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream($data['karyawan']['nomor_pegawai'] . "-slip-gaji-" . $data['karyawan']['nama']);
	}
}
