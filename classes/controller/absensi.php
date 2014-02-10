<?php
class absensi
{
	public function index()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$db = $m->karyawan;	
		$collection = $db->absensi;

		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 5;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $collection->find()->skip($skip)->limit($limit_doc)->sort(array("nomer_bukti" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		$fw->set("link", "absensi/index?page=".$page);
		
		$view = View::instance()->render("absensi/index.php"); 
		echo $view;	
	}
	
	public function add()
	{
		$fw = Base::instance();
		
		if(!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jam_masuk = $fw->get("POST.jam_masuk");
			$jam_keluar = $fw->get("POST.jam_keluar");
			
			$pemerikasaan = TRUE;
			
			if($nama = "")
			{
				$pemerikasaan = FALSE;
				$fw->set("error_nama", "Nama Harus Di isi");
			}
			
			if($jam_masuk = "")
			{
				$pemerikasaan = FALSE;
				$fw->set("error_masuk", "Jam Masuk Harus Di isi");
			}
			
			if($jam_keluar = "")
			{
				$pemerikasaan = FALSE;
				$fw->set("error_keluar", "Jam Keluar Harus Di isi");
			}
			//--------------------------------------
			if(!$pemeriksaan)
			{
				$fw->set("nama", $nama);
				$fw->set("jam_masuk", $jam_masuk);
				$fw->set("jam_keluar", $jam_keluar);
			}
			//--------------------------------------
			if($pemeriksaan)
			{
				$m = New MongoClient();
				$db = $m->karyawan;
				$collection = $db->absensi;
				
				$data = array(
					'nama' => $nama,
					'jam_masuk' => $jam_masuk,
					'jam_keluar' => $jam_keluar,
				);
				$collection->insert($data);
				$fw->reriute("/absensi/index");
 			}
		}
		else
		{
			$fw->set('nama', '');
			$fw->set('jam_masuk', '');
			$fw->set('jam_keluar', '');
		}
		
	$fw->set('link', "/absensi/add");
	
	$ww = View::instance()->render("absensi/add.php"); 
	echo $ww;
	
	}
	
	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		$m = new MongoClient();
		$db = $m->karyawan;
		$collection = $db->absensi;
		$mcollection = $collection->findOne(array('_id' => new MongoId($id)));
		
		if(!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jam_masuk = $fw->get("POST.jam_masuk");
			$jam_keluar = $fw->get("POST.jam_keluar");	
		}
		
		$pemeriksaan = TRUE;
		
		if($nama = "")
		{
			$pemeriksaan = FALSE;
			$fw->set("error_nama", "Nama Harus Di isi");
		}
		
		if($jam_masuk = "")
		{
			$pemeriksaan = FALSE;
			$fw->set("error_masuk", "Jam Masuk Harus Di isi");
		}
		
		if($jam_keluar = "")
		{
			$pemeriksaan = FALSE;
			$fw->set("error_keluar", "Jam Keluar Harus Di isi");
		}
		//-------------------------------------
		if(!$pemeriksaan)
		{
			$fw->set("nama", $nama);
			$fw->set("jam_masuk", $jam_masuk);
			$fw->set("jam_keluar", $jam_keluar);
		}
		//------------------------------------
		if($pemeriksaan)
		{
			$m = new MongoClient();
			$db = $m->karyawan;
			$collection = $db->absensi;
			
			$data = array(
				'nama' => $nama,
				'jam_masuk' => $jam_masuk,
				'jam_keluar' => $jam_keluar,
			);
			$collection->update(array('_id' => new MongoId($id)), array('$set' => $data));
			$fw->reroute("/absensi/index");
		}
		else
		{
			$fw->set('nama', $collection['nama']);
			$fw->set('jam_masuk', $collection['jam_masuk']);
			$fw->set('jam_keluar', $collection['jam_keluar']);
		}
	
	$fw->set('link', "/absensi/add");
	
	$ww = View::instance()->render("absensi/add.php"); 
	echo $ww;
		
	}
}
?>