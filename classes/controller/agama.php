<?php

class agama
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$ag = $db->agama;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $ag->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		
		$fw->set('link', "agama/index?page=".$page);
		$view = View::instance()->render("agama/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			$agama = $fw->get("POST.agama");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($agama == '')
			{
				$datakaryawan = FALSE;
				
				$error_agama = " *Agama harus di isi";
				$fw->set('error_agama', $error_agama);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('agama', $agama);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$ag = $db->agama;
				$data = array (
					'agama' => $agama,
					'deskripsi' => $deskripsi,
				);
				$ag->insert($data);
				$fw->reroute("/agama/index");
			}
			
		}
		else
		{
			$fw->set('agama', '');
			$fw->set('deskripsi', '');
		}
		
		$fw->set('link', '/agama/add');
		$view = View::instance()->render("agama/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$ag = $db->agama;
		$sag = $ag->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$agama = $fw->get("POST.agama");
			$deskripsi = $fw->get("POST.deskripsi");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($agama == '')
			{
				$datakaryawan = FALSE;
				
				$error_agama = " *Agama harus di isi";
				$fw->set('error_agama', $error_agama);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('agama', $agama);
				$fw->set('deskripsi', $deskripsi);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$ag = $db->agama;
				$data = array (
					'agama' => $agama,
					'deskripsi' => $deskripsi,
				);
				
				$newdata = array('$set' => $data);
				$ag->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/agama/index");
			}
			
		}
		else
		{
			$fw->set('agama', $sag['agama']);
			$fw->set('deskripsi', $sag['deskripsi']);
		}
		
		$fw->set('link', '/agama/edit?id='.$id);
		$view = View::instance()->render("agama/add.php"); 
		echo $view;
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$id = $fw->get('GET["id"]');
		$db = $local->karyawan;
		$ag = $db->agama;

		$ag->remove(array('_id' => new MongoId($id)));
		$fw->reroute('/agama/index');

	}
}
