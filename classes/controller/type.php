<?php
class type
{
	public function index()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$db = $m->karyawan;	
		$collection = $db->type;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 10;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $collection->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		$fw->set("link", "type/index?page=".$page);
		
		//$data = $collection->find();
		//$fw->set('data', $data);		
		
		//$fw->set("link", '');
		$view = View::instance()->render("type/index.php"); 
		echo $view;
	}
	
	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{	
			//submit
			$nama = $fw->get("POST.nama");
			$kode = $fw->get("POST.kode");
			$type = $fw->get("POST.type");
			$deskripsi = $fw->get("POST.deskripsi");
			
			$adaygsalah = TRUE;
			
			if ($nama == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_nama', "Nama harus di isi");
			}
			
			if ($kode == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_kode', "Kode harus di isi");
			}
			if ($type == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_type', "Type harus di isi");
			}
			/*if ($deskripsi == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_des', "Deskripsi harus di isi");
			}*/
			
			if (!$adaygsalah) 
			{
				$fw->set('nama', $nama);
				$fw->set('kode', $kode);
				$fw->set('type', $type);
				$fw->set('deskripsi', $deskripsi);
			}
			
			if($adaygsalah)
			{
				$m = new MongoClient();
				$db = $m->karyawan;
				$collection = $db->type;
				$data = array(
					'nama' => $nama,
					'kode' => $kode,
					'type' => $type,
					'deskripsi' => $deskripsi,
					'created_time' => time(),
				);
				$collection->insert($data);
				$fw->reroute("/type/index");
			}
		}
		else
		{
			$fw->set('type', '');
			$fw->set('nama', '');
			$fw->set('kode', '');
			$fw->set('deskripsi', '');
		}
		$fw->set('link', "/type/add");
		
		$ww = View::instance()->render("type/add.php"); 
		echo $ww;
	}
	
	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		$m = new MongoClient();
		$db = $m->karyawan;
		$collection = $db->type;
		$mcollection = $collection->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{	
			//submit
			$nama = $fw->get("POST.nama");
			$kode = $fw->get("POST.kode");
			$type = $fw->get("POST.type");
			$deskripsi = $fw->get("POST.deskripsi");
			
			$adaygsalah = TRUE;
			
			if ($nama == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_nama', "Nama harus di isi");
			}
			
			if ($kode == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_kode', "Kode harus di isi");
			}
			if ($type == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_type', "Type harus di isi");
			}
			/*if ($deskripsi == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_des', "Deskripsi harus di isi");
			}*/
			
			if (!$adaygsalah) 
			{
				$fw->set('nama', $nama);
				$fw->set('kode', $kode);
				$fw->set('type', $type);
				$fw->set('deskripsi', $deskripsi);
			}
			
			if($adaygsalah)
			{
				$m = new MongoClient();
				$db = $m->karyawan;
				$collection = $db->type;
				$data = array(
					'nama' => $nama,
					'kode' => $kode,
					'type' => $type,
					'deskripsi' => $deskripsi,
					'time_edited' => time(),
				);
				$collection->update(array('_id' => new MongoId($id)), array('$set' => $data));
				$fw->reroute("/type/index");
			}
		}
	else
	{
		$fw->set('nama', $mcollection['nama']);
		$fw->set('type', $mcollection['type']);
		$fw->set('kode', $mcollection['kode']);
		$fw->set('deskripsi', $mcollection['deskripsi']);
	}
		$fw->set('link', '/type/edit?id='.$id);
	
		$ww = View::instance()->render("type/add.php"); 
		echo $ww;
}

	public function delete()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$_id = $_GET['id'];
		
		$db = $m->karyawan;
		$collection = $db->type;
		$collection->remove(array('_id' => new MongoId($_id)));
		$fw->reroute('/type/index');
	}
}
?>