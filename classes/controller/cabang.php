<?php
class cabang
{
	public function index()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$db = $m->karyawan;	
		$collection = $db->cabang;
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $collection->find()->skip($skip)->limit($limit_doc)->sort(array("name" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		$fw->set("link", "cabang/index?page=".$page);
		
		$view = View::instance()->render("cabang/index.php"); 
		echo $view;
	}
	
	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{	
			//submit
			$name = $fw->get("POST.name");
			$alamat = $fw->get("POST.alamat");
			$telephone = $fw->get("POST.telephone");
			$kota = $fw->get("POST.kota");
			$deskripsi = $fw->get("POST.deskripsi");
			$status = $fw->get("POST.status");
			
			$adaygsalah = TRUE;
			
			if ($name == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_name', "Nama harus di isi");
			}
			if ($alamat == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_alamat', "Alamat harus di isi");
			}
			if (strlen(trim($telephone)) == 0)
			{
				$adaygsalah = FALSE;
				$fw->set('error_telephone', "Telephone harus di isi");
			}
			if (strlen(trim($telephone)) > 0)
			{
				if (!is_numeric($telephone))
				{
					$adaygsalah = FALSE;
					$fw->set('error_telephone_numeric', "Harus bilangan");
				}
			}
			if ($kota == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_kota', "Kota harus di isi");
			}
			
			//-----------------------------
			if (!$adaygsalah) 
			{
				$fw->set('name', $name);
				$fw->set('alamat', $alamat);
				$fw->set('telephone', $telephone);
				$fw->set('kota', $kota);
				$fw->set('deskripsi', $deskripsi);
				
				$status = "not";
				if(isset($_POST['status']))
					$status = "active";
				$fw->set('status', $status);
			}
			
			//---------------------------------
			if($adaygsalah)
			{
				$status = "not";
				if(isset($_POST['status']))
					$status = "active";
				
				$m = new MongoClient();
				$db = $m->karyawan;
				$collection = $db->cabang;
				$data = array(
					'name' => $name,
					'alamat' => $alamat,
					'telephone' => intval($telephone),
					'kota' => $kota,
					'deskripsi' => $deskripsi,
					'status' => $status,
					'created_time' => time(),
				);
				$collection->insert($data);
				$fw->reroute("/cabang/index");
			}
			
		}
		else
		{
			$fw->set('name', '');
			$fw->set('alamat', '');
			$fw->set('telephone', '');
			$fw->set('kota', '');
			$fw->set('deskripsi', '');
			$fw->set('status', '');
		}
		$fw->set('link', "/cabang/add");
		
		$ww = View::instance()->render("cabang/add.php"); 
		echo $ww;
	}
	
	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		$m = new MongoClient();
		$db = $m->karyawan;
		$collection = $db->cabang;
		$mcollection = $collection->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{	
			//submit
			$name = $fw->get("POST.name");
			$alamat = $fw->get("POST.alamat");
			$telephone = $fw->get("POST.telephone");
			$kota = $fw->get("POST.kota");
			$deskripsi = $fw->get("POST.deskripsi");
			$status = $fw->get("POST.status");
			
			$adaygsalah = TRUE;
			
			if ($name == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_name', "Nama harus di isi");
			}
			if ($alamat == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_alamat', "Alamat harus di isi");
			}
			if (strlen(trim($telephone)) == 0)
			{
				$adaygsalah = FALSE;
				$fw->set('error_telephone', "Telephone harus di isi");
			}
			if (strlen(trim($telephone)) > 0)
			{
				if (!is_numeric($telephone))
				{
					$adaygsalah = FALSE;
					$fw->set('error_telephone_numeric', "Harus bilangan");
				}
			}
			if ($kota == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_kota', "Kota harus di isi");
			}
			
			//------------------------------
			if (!$adaygsalah) 
			{
				$fw->set('name', $name);
				$fw->set('alamat', $alamat);
				$fw->set('telephone', $telephone);
				$fw->set('kota', $kota);
				$fw->set('deskripsi', $deskripsi);
				
				$status = "not";
				if(isset($_POST['status']))
					$status = "active";
				$fw->set('status', $status);
			}
			
			//---------------------------------
			if($adaygsalah)
			{
				$status = "not";
				if(isset($_POST['status']))
					$status = "active";
				
				$m = new MongoClient();
				$db = $m->karyawan;
				$collection = $db->cabang;
				$data = array(
					'name' => $name,
					'alamat' => $alamat,
					'telephone' => intval($telephone),
					'kota' => $kota,
					'deskripsi' => $deskripsi,
					'status' => $status,
					'time_edited' => time(),
				);
				$collection->update(array('_id' => new MongoId($id)), array('$set' => $data));
				$fw->reroute("/cabang/index");
			}
			
		}
		else
		{			
			$fw->set('name', $mcollection['name']);
			$fw->set('alamat', $mcollection['alamat']);
			$fw->set('telephone', $mcollection['telephone']);
			$fw->set('kota', $mcollection['kota']);
			$fw->set('deskripsi', $mcollection['deskripsi']);
			$fw->set('status', $mcollection['status']);
		}
		$fw->set('link', '/cabang/edit?id='.$id);
		
		$ww = View::instance()->render("cabang/add.php"); 
		echo $ww;
		
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$_id = $_GET['id'];
		
		$db = $m->karyawan;
		$collection = $db->cabang;
		$collection->remove(array('_id' => new MongoId($_id)));
		$fw->reroute('/cabang/index');
	}
}
?>