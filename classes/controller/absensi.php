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
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jam_masuk = $fw->get("POST.jam_masuk");
			$jam_keluar = $fw->get("POST.jam_keluar");
			
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			if($jam_masuk == '')
			{
				$datakaryawan = FALSE;
				
				$error_jam_masuk = " *Jam masuk harus di isi";
				$fw->set('error_jam_masuk', $error_jam_masuk);
			}
			if($jam_keluar == '')
			{
				$datakaryawan = FALSE;
				
				$error_jam_keluar = " *Jam keluar harus di isi";
				$fw->set('error_jam_keluar', $error_jam_keluar);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('jam_masuk', $jam_masuk);
				$fw->set('jam_keluar', $jam_keluar);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$ag = $db->absensi;
				$data = array (
					'nama' => $nama,
					'jam_masuk' => $jam_masuk,
					'jam_keluar' => $jam_keluar,
				);
				$ag->insert($data);
				$fw->reroute("/absensi/index");
			}
			
		}
		else
		{
			$fw->set('nama', '');
			$fw->set('jam_masuk', '');
			$fw->set('jam_keluar', '');
		}
		
		$fw->set('link', '/absensi/add');
		$view = View::instance()->render("absensi/add.php"); 
		echo $view;
		
	}
	
	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$ag = $db->absensi;
		$sag = $ag->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$nama = $fw->get("POST.nama");
			$jam_masuk = $fw->get("POST.jam_masuk");
			$jam_keluar = $fw->get("POST.jam_keluar");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				
				$error_nama = " *Nama harus di isi";
				$fw->set('error_nama', $error_nama);
			}
			if($jam_masuk == '')
			{
				$datakaryawan = FALSE;
				
				$error_jam_masuk = " *Jam masuk harus di isi";
				$fw->set('error_jam_masuk', $error_jam_masuk);
			}
			if($jam_keluar == '')
			{
				$datakaryawan = FALSE;
				
				$error_jam_keluar = " *Jam keluar harus di isi";
				$fw->set('error_jam_keluar', $error_jam_keluar);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('nama', $nama);
				$fw->set('jam_masuk', $jam_masuk);
				$fw->set('jam_keluar', $jam_keluar);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$ag = $db->absensi;
				$data = array (
					'nama' => $nama,
					'jam_masuk' => $jam_masuk,
					'jam_keluar' => $jam_keluar,
				);
				
				$newdata = array('$set' => $data);
				$ag->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/absensi/index");
			}
			
		}
		else
		{
			$fw->set('nama', $sag['nama']);
			$fw->set('jam_masuk', $sag['jam_masuk']);
			$fw->set('jam_keluar', $sag['jam_keluar']);
		}
		
		$fw->set('link', '/absensi/edit?id='.$id);
		$view = View::instance()->render("absensi/add.php"); 
		echo $view;
	}
}
?>