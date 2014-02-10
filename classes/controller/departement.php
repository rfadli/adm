<?php

class departement
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$dept = $db->departement;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $dept->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		
		$fw->set('link', "departement/index?page=".$page);
		
		$view = View::instance()->render("departement/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$departement = $fw->get("POST.departement");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			
			if($departement == '')
			{
				$datakaryawan = FALSE;
				
				$error_dept = " *Departement harus di isi";
				$fw->set('error_dept', $error_dept);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('departement', $departement);
				$fw->set('deskripsi', $deskripsi);
			}
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$dept = $db->departement;
				$data = array (
					'nama' => $nama,
					'departement' => $departement,
					'deskripsi' => $deskripsi,
				);
				$dept->insert($data);
				$fw->reroute("/departement/index");
			}
			
		}
		else
		{
			$fw->set('nama', '');
			$fw->set('departement', '');
			$fw->set('deskripsi', '');
		}
		
		$fw->set("link", '/departement/add');
		$view = View::instance()->render("departement/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$dept = $db->departement;
		$mdept = $dept->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$departement = $fw->get("POST.departement");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			
			if($departement == '')
			{
				$datakaryawan = FALSE;
				
				$error_dept = " *Departement harus di isi";
				$fw->set('error_dept', $error_dept);
			}
			
			//----------blok pemilihan--------------//
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('departement', $departement);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$dept = $db->departement;
				$data = array (
					'nama' => $nama,
					'departement' => $departement,
					'deskripsi' => $deskripsi,
				);
				
				$newdata = array('$set' => $data);
				$dept->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/departement/index");
			}
			
		}
		else
		{
			$fw->set('nama', $mdept['nama']);
			$fw->set('departement', $mdept['departement']);
			$fw->set('deskripsi', $mdept['deskripsi']);
		}
		$fw->set("link", '/departement/edit?id='.$id);
		
		$view = View::instance()->render("departement/add.php"); 
		echo $view;
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$id = $fw->get('GET["id"]');
		$db = $local->karyawan;
		$dept = $db->departement;
		
		$dept->remove(array('_id' => new MongoId($id)));
		$fw->reroute('/departement/index');
	}
}
