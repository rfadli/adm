<?php

class status_pegawai
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$mstatpeg = $db->status_pegawai;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $mstatpeg->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		
		$fw->set('link', "status_pegawai/index?page=".$page);
		$view = View::instance()->render("status_pegawai/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			$status_pegawai = $fw->get("POST.status_pegawai");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($status_pegawai == '')
			{
				$datakaryawan = FALSE;
				
				$error_status_pegawai = " *status harus di isi";
				$fw->set('error_status_pegawai', $error_status_pegawai);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('status_pegawai', $status_pegawai);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$mstatpeg = $db->status_pegawai;
				$data = array (
					'status_pegawai' => $status_pegawai,
					'deskripsi' => $deskripsi,
				);
				$mstatpeg->insert($data);
				$fw->reroute("/status_pegawai/index");
			}
			
		}
		else
		{
			$fw->set('status_pegawai', '');
			$fw->set('deskripsi', '');
		}
		
		$fw->set('link', '/status_pegawai/add');
		$view = View::instance()->render("status_pegawai/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$mstatpeg = $db->status_pegawai;
		$mstatpegm = $mstatpeg->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$status_pegawai = $fw->get("POST.status_pegawai");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($status_pegawai == '')
			{
				$datakaryawan = FALSE;
				
				$error_status_pegawai = " *status harus di isi";
				$fw->set('error_status_pegawai', $error_status_pegawai);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('status_pegawai', $status_pegawai);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$mstatpeg = $db->status_pegawai;
				$data = array (
					'status_pegawai' => $status_pegawai,
					'deskripsi' => $deskripsi,
				);
				
				$newdata = array('$set' => $data);
				$mstatpeg->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/status_pegawai/index");
			}
			
		}
		else
		{
			$fw->set('status_pegawai', $mstatpegm['status_pegawai']);
			$fw->set('deskripsi', $mstatpegm['deskripsi']);
		}
		
		$fw->set('link', '/status_pegawai/edit?id='.$id);
		$view = View::instance()->render("status_pegawai/add.php"); 
		echo $view;
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$id = $fw->get('GET["id"]');
		$db = $local->karyawan;
		$mstatpeg = $db->status_pegawai;

		$mstatpeg->remove(array('_id' => new MongoId($id)));
		$fw->reroute('/status_pegawai/index');

	}
}
