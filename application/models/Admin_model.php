<?php

class Admin_model extends CI_Model
{
	function hitung_siswa()
	{
		$this->db->where('level', 'siswa');
		$query = $this->db->get('login');
		return $query->num_rows();
	}

	function hitung_mapel()
	{
		$query = $this->db->get('mapel');
		return $query->num_rows();
	}

	public function record_count_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('login', 'login.username = siswa.username');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_sis($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('login', 'login.username = siswa.username');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_siswa($arg)
	{
		$data = array(
			'username' => $arg[1],
			'password' => md5($arg[4]),
			'level' => 'siswa',
			'nama' => $arg[2]
		);
		$this->db->insert('login', $data);
		$detail = array(
			'nis' => $arg[0],
			'alamat' => $arg[3],
			'nisn' => $arg[5],
			'jurusan' => $arg[6],
			'kelas' => $arg[7],
			'semester' => $arg[8],
			'username' => $arg[1]
		);
		$this->db->insert('siswa', $detail);
	}

	function delete_siswa($id)
	{
		$this->db->where('username', $id);
		$this->db->delete('siswa');

		$this->db->where('username', $id);
		$this->db->delete('login');
	}

	function update_siswa($form, $username)
	{
		$data = array(
			'username' => $form[1],
			'password' => md5($form[4]),
			'a.nama' => $form[2]
		);
		$detail = array(
			'b.alamat' => $form[3],
			'b.nisn' => $form[5],
			'jurusan' => $form[6],
			'kelas' => $form[7],
			'semester' => $form[8],
			'username' => $form[1]
		);
		$this->db->where('a.username', $username);
		$this->db->update('login as a', $data);
		$this->db->where('b.username', $username);
		$this->db->update('siswa as b', $detail);
	}

	public function record_count_mapel()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_pel($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('mapel');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_mapel($arg)
	{
		$data = array(
			'kdmapel' => $arg[0],
			'nmmapel' => $arg[1],
			'kb' => $arg[2]
		);
		$this->db->insert('mapel', $data);
	}
	function update_mapel($form, $kdmapel)
	{
		$data = array(
			'nmmapel' => $form[1],
			'kb' => $form[2]
		);
		$this->db->where('kdmapel', $kdmapel);
		$this->db->update('mapel', $data);
	}
	function delete_mapel($id)
	{
		$this->db->where('kdmapel', $id);
		$this->db->delete('mapel');
	}

	function tampil_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('login', 'login.username = siswa.username');
		$query = $this->db->get();

		if ($query->result()) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama
				);
			}
			return $data;
		} else {
			return FALSE;
		}
	}

	function tampil_mapel()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$query = $this->db->get();

		if ($query->result()) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->kdmapel,
					$content->nmmapel
				);
			}
			return $data;
		} else {
			return FALSE;
		}
	}

	function record_count_rapor_siswa($nis)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.nis', $nis);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_rapor_siswa($limit, $start, $nis)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.nis', $nis);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function record_count_rapor_mapel($kdmapel)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.kdmapel', $kdmapel);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function fetch_rapor_mapel($limit, $start, $kdmapel)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.kdmapel', $kdmapel);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function add_rapor($arg)
	{
		$data = array(
			'nis' => $arg[1],
			'kdmapel' => $arg[0],
			'nilpel' => $arg[2],
			'nilket' => $arg[3],
		);
		$this->db->insert('nilai', $data);
	}

	function delete_nilai($kdmapel, $nis)
	{
		$this->db->where('kdmapel', $kdmapel);
		$this->db->where('nis', $nis);
		$this->db->delete('nilai');
	}

	function get_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('login', 'login.username = siswa.username');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama,
					$content->alamat,
					$content->nisn,
					$content->jurusan,
					$content->kelas,
					$content->semester
				);
			}
			return $data;
		}
		return false;
	}

	function get_mapel()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->kdmapel,
					$content->nmmapel,
					$content->kb
				);
			}
			return $data;
		}
		return false;
	}

	function get_nilai_siswa($nis)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.nis', $nis);
		$query = $this->db->get();
		if ($query->result()) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama,
					$content->nisn,
					$content->nmmapel,
					$content->kb,
					$content->nilpel,
					$content->nilket,
					$content->jurusan,
					$content->kelas,
					$content->semester
				);
			}
			return $data;
		} else {
			return FALSE;
		}
	}

	function get_nilai_mapel($kdmapel)
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('mapel', 'mapel.kdmapel = nilai.kdmapel');
		$this->db->join('siswa', 'nilai.nis = siswa.nis');
		$this->db->join('login', 'login.username = siswa.username');
		$this->db->where('nilai.kdmapel', $kdmapel);
		$query = $this->db->get();
		if ($query->result()) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->nama,
					$content->nisn,
					$content->nmmapel,
					$content->kb,
					$content->nilpel,
					$content->nilket,
					$content->jurusan,
					$content->kelas,
					$content->semester

				);
			}
			return $data;
		} else {
			return FALSE;
		}
	}
}
