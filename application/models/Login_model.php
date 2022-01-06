<?php

class Login_model extends CI_Model
{
	function cek($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('login');
		return $query;
	}

	function detail($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('siswa');
		if ($query->result()) {
			foreach ($query->result() as $content) {
				$data[] = array(
					$content->nis,
					$content->alamat,
					$content->nisn,
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
