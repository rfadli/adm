<?php

class bulan
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$bul = $db->bulan;
		$data = $bul->find();
		$fw->set('data', $data);
		
		$fw->set('link', '');
		$view = View::instance()->render("bulan/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			$kode = $fw->get("POST.kode");
			$bulan = $fw->get("POST.bulan");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($kode == '')
			{
				$datakaryawan = FALSE;
				
				$fw->set('error_kode', " *Kode harus di isi");
			}
			
			if($bulan == '')
			{
				$datakaryawan = FALSE;
				
				$fw->set('error_bulan', " *Bulan harus di isi");
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('kode', $kode);
				$fw->set('bulan', $bulan);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$bul = $db->bulan;
				$data = array (
					'kode' => $kode,
					'bulan' => $bulan,
				);
				$bul->insert($data);
				$fw->reroute("/bulan/index");
			}
			
		}
		else
		{
			$fw->set('kode', '');
			$fw->set('bulan', '');
		}
		
		$fw->set('link', '/bulan/add');
		
		$view = View::instance()->render("bulan/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$bul = $db->bulan;
		$mbul = $bul->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$kode = $fw->get("POST.kode");
			$bulan = $fw->get("POST.bulan");
				
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			if($kode == '')
			{
				$datakaryawan = FALSE;
				
				$error_agama = " *Agama harus di isi";
				$fw->set('error_agama', $error_agama);
			}
			
			if($bulan == '')
			{
				$datakaryawan = FALSE;
				
				$error_agama = " *Agama harus di isi";
				$fw->set('error_agama', $error_agama);
			}
			
			//----------blok pemilihan--------------//
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('kode', $kode);
				$fw->set('bulan', $bulan);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$local = new MongoClient();
				
				$db = $local->karyawan;
				$bul = $db->bulan;
				$data = array (
					'kode' => $kode,
					'bulan' => $bulan,
				);
				$newdata = array('$set' => $data);
				$bul->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/bulan/index");
			}
			
		}
		else
		{
			$fw->set('kode', $mbul['kode']);
			$fw->set('bulan', $mbul['bulan']);
		}
		$fw->set('link', '/bulan/edit?id='.$id);
		
		$view = View::instance()->render("bulan/add.php"); 
		echo $view;
	}
	
	public function delete()
	{
		if(!empty($_POST))
		{
			$local = new MongoClient();
			
			$db = $local->karyawan;
			$collection = $db->jabatan;
			$mcoll = $collection->findOne(array('_id' => new MongoId($_POST['id'])));
			$collection->remove(array('_id' => new MongoId($_POST['id'])));
			$this->fw->reroute('/jabatan/index');
		}
	}
}
