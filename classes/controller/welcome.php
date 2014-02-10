<?
class welcome
{
	private $x;
	
	/*public function index()
	{
		$fw=Base::instance();
		$nama = $fw->get("GET.nama");
		$umur = $fw->get("GET.umur");
		$fw->set("name", "tes");
		$fw->set("nama", $nama);
		$fw->set("umur", $umur);
		$view = View::instance()->render("welcome/index.php"); 
		echo $view;
		
	}*/
	
	public function index()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$db = $m->karyawan;	
		$collection = $db->jurnal;

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
		$fw->set("link", "welcome/index?page=".$page);
		
		$view = View::instance()->render("welcome/index.php"); 
		echo $view;
	}
	
	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{	
			//submit
			$tgl = $fw->get("POST.tgl");
			$ket = $fw->get("POST.ket");
			$type = $fw->get("POST.type");
			$document = $_FILES['document'];
			$nomer = $fw->get("POST.nomer");
			$cabang = $fw->get("POST.cabang");
			$jam = $fw->get("POST.jam");
			$debit = $fw->get("POST.debit");
			$kredit = $fw->get("POST.kredit");
			$nomor_bukti = $fw->get("POST.nomor_bukti");
			
			$adaygsalah = TRUE;
			
			if ($tgl == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_tgl', "Tanggal harus di isi");
			}
			if ($nomor_bukti == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_no_buk', "No bukti harus di isi");
			}
			if ($ket == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_ket', "Keterangan harus di isi");
			}
			if ($type == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_type', "Type harus di isi");
			}
			if (strlen(trim($nomer)) == 0)
			{
				$adaygsalah = FALSE;
				$fw->set('error_nomer', "Nomor harus di isi");
			}
			
			if (strlen(trim($nomer)) > 0)
			{
				if (!is_numeric($nomer))
				{
					$adaygsalah = FALSE;
					$fw->set('error_nomer_numeric', "Harus bilangan");
				}
			}
			
			if (strlen(trim($debit)) > 0)
			{
				if (!is_numeric($debit))
				{
					$adaygsalah = FALSE;
					$fw->set('error_debit_numeric', "Harus bilangan");
				}
			}
			
			if (strlen(trim($kredit)) > 0)
			{
				if (!is_numeric($kredit))
				{
					$adaygsalah = FALSE;
					$fw->set('error_kredit_numeric', "Harus bilangan");
				}
			}
			
			if ($jam == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_jam', "Jam harus di isi");
			}
			
			/*$direktori = "upload/document/";
			foreach ($_FILES["document"]["name"] as $ft ) 
			{
			    if ($ft == UPLOAD_ERR_OK) 
			    {
			        $tmp_name = $_FILES["document"]["tmp_name"];
			        $name = $_FILES["document"]["name"];
			        move_uploaded_file($tmp_name, $direktori."/".$name);
			    }
			}*/
			
			$target_path = "upload/document/";
			if(isset($_FILES['document']['name']))
			{
				$x = 0;
				foreach($_FILES['document']['name'] as $ft)
				{
					if(isset($ft))
					{
						$namafilefoto = $ft;
						if(strlen(trim($namafilefoto)) > 0)
						{
							$target_path = $target_path . basename( $_FILES['document']['name'][$x]); 
			
							if(move_uploaded_file($_FILES['document']['tmp_name'][$x], $target_path))
							{
							    basename( $_FILES['document']['name'][$x]);
							} 
						}				
						
					}
					$x++;
				}	
			}
			
			
			//------------------------
			if (!$adaygsalah) //mewakili yang salah 
			{
				//yang datanya belum kumplit
				$fw->set('tgl', $tgl);
				$fw->set('ket', $ket);
				$fw->set('type', $type);
				$fw->set('document', $_FILES['document']['name']);
				/*if(isset($_FILES['document']['name']))
					$fw->set('document', $_FILES['document']['name']);*/
				$fw->set('nomer', $nomer);
				$fw->set('cabang', $cabang);
				$fw->set('jam', $jam);
				$fw->set('debit', $debit);
				$fw->set('kredit', $kredit);
				$fw->set('nomor_bukti', $nomor_bukti);
			}
			
			//--------------------------------
			if($adaygsalah)
			{
				$tanggal = $tgl;
				$tanggal_to = explode("-", $tanggal);
				$tggl = $tanggal_to [2]."-".$tanggal_to[1]."-".$tanggal_to[0];
				
				$jams = $jam;
				$mjam = explode(":", $jams);
				$mmjam = $mjam[0].":".$mjam[1].":".$mjam[2];
				
				//yang datanya kumplit
				$m = new MongoClient();
				
				$db = $m->karyawan;
				$collection = $db->cabang;
				$mcab = $collection->findOne(array('_id' => new MongoId($_POST['cabang'])));
				
				$collection = $db->type;
				$mtype = $collection->findOne(array('_id' => new MongoId($_POST['type'])));
				
				$collection = $db->jurnal;
				
				$data = array(
					'tanggal' => strtotime($tggl),
					'jam' => strtotime($mmjam),
					'keterangan' => $ket,
					'type' => $type,
					'nomor_bukti' => $nomor_bukti,
					'debit' => intval($debit),
					'kredit' => intval($kredit),
					'nomer' => intval($nomer),
					'created_time' => time(),
					'cabang' => new MongoId($fw->get("POST.cabang")),
					'type' => new MongoId($fw->get("POST.type")),
					'document' => $document,
				);
				$collection->insert($data);
				$fw->reroute("/welcome/index");
			}
		}
		else
		{
			//belum mengenal post
			$fw->set('tgl', '');
			$fw->set('ket', '');
			$fw->set('type', '');
			$fw->set('document', array());
			$fw->set('nomer', '');
			$fw->set('cabang', '');
			$fw->set('jam', '');
			$fw->set('debit', '');
			$fw->set('kredit', '');
			$fw->set('nomor_bukti', '');
		}
		
		$fw->set('link', "/welcome/add");
		
		$ww = View::instance()->render("welcome/add.php"); 
		echo $ww;
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		$m = new MongoClient();
		$db = $m->karyawan;
		$collection = $db->jurnal;
		$mcollection = $collection->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{	
			//submit
			$tgl = $fw->get("POST.tgl");
			$ket = $fw->get("POST.ket");
			$type = $fw->get("POST.type");
			$document = $_FILES['document'];
			$nomer = $fw->get("POST.nomer");
			$cabang = $fw->get("POST.cabang");
			$jam = $fw->get("POST.jam");
			$debit = $fw->get("POST.debit");
			$kredit = $fw->get("POST.kredit");
			$nomor_bukti = $fw->get("POST.nomor_bukti");
			
			$adaygsalah = TRUE;
			
			if ($tgl == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_tgl', "Tanggal harus di isi");
			}
			if ($nomor_bukti == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_no_buk', "No bukti harus di isi");
			}
			if ($ket == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_ket', "Keterangan harus di isi");
			}
			if ($type == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_type', "Type harus di isi");
			}
			if (strlen(trim($nomer)) == 0)
			{
				$adaygsalah = FALSE;
				$fw->set('error_nomer', "Nomor harus di isi");
			}
			
			if (strlen(trim($nomer)) > 0)
			{
				if (!is_numeric($nomer))
				{
					$adaygsalah = FALSE;
					$fw->set('error_nomer_numeric', "Harus angka");
				}
			}
			if (strlen(trim($debit)) > 0)
			{
				if (!is_numeric($debit))
				{
					$adaygsalah = FALSE;
					$fw->set('error_debit_numeric', "Harus angka");
				}
			}
			
			if (strlen(trim($kredit)) > 0)
			{
				if (!is_numeric($kredit))
				{
					$adaygsalah = FALSE;
					$fw->set('error_kredit_numeric', "Harus angka");
				}
			}
			
			if ($jam == '')
			{
				$adaygsalah = FALSE;
				$fw->set('error_jam', "Jam harus di isi");
			}
			
			$target_path = "upload/document/";
			if(isset($_FILES['document']['name']))
			{
				$x = 0;
				foreach($_FILES['document']['name'] as $ft)
				{
					if(isset($ft))
					{
						$namafilefoto = $ft;
						if(strlen(trim($namafilefoto)) > 0)
						{
							$target_path = $target_path . basename( $_FILES['document']['name'][$x]); 
			
							if(move_uploaded_file($_FILES['document']['tmp_name'][$x], $target_path))
							{
							    basename( $_FILES['document']['name'][$x]);
							} 
						}				
						
					}
					$x++;
				}	
			}
			
			if (!$adaygsalah)
			{
				$fw->set('tgl', $tgl);
				$fw->set('ket', $ket);
				$fw->set('type', $type);
				//$fw->set('document', $_FILES['document']['name']);
				if(isset($_FILES['document']['name']))
					$fw->set('document', $_FILES['document']['name']);
				$fw->set('nomer', $nomer);
				$fw->set('cabang', $cabang);
				$fw->set('jam', $jam);
				$fw->set('debit', $debit);
				$fw->set('kredit', $kredit);
				$fw->set('nomor_bukti', $nomor_bukti);
			}
			
			if($adaygsalah)
			{
				$tanggal = $tgl;
				$tanggal_to = explode("-", $tanggal);
				$tggl = $tanggal_to [2]."-".$tanggal_to[1]."-".$tanggal_to[0];
				
				$jams = $jam;
				$mjam = explode(":", $jams);
				$mmjam = $mjam[0].":".$mjam[1].":".$mjam[2];
				
				$m = new MongoClient();
				
				$db = $m->karyawan;
				$collection = $db->cabang;
				$mcab = $collection->findOne(array('_id' => new MongoId($_POST['cabang'])));
				
				$collection = $db->type;
				$mtype = $collection->findOne(array('_id' => new MongoId($_POST['type'])));
				
				$collection = $db->jurnal;
				
				$data = array(
					'tanggal' => strtotime($tggl),
					'jam' => strtotime($mmjam),
					'keterangan' => $ket,
					'type' => $type,
					'nomor_bukti' => $nomor_bukti,
					'debit' => intval($debit),
					'kredit' => intval($kredit),
					'nomer' => intval($nomer),
					'cabang' => new MongoId($fw->get('POST.cabang')),
					'type' => new MongoId($fw->get('POST.type')),
					'document' => $document,
				);
				
				$collection->update(array('_id' => new MongoId($id)), array('$set' => $data));
				$fw->reroute("/welcome/index");
			}
		}
		else
		{			
			$fw->set('tgl', date('d-m-Y',$mcollection['tanggal']));
			$fw->set('ket', $mcollection['keterangan']);
			$fw->set('type', $mcollection['type']);
			$fw->set('document', array($mcollection['document']['name']));
			/*if(isset($mcollection['document']))
				$fw->set('document', $collection['document']);
			else {
				$fw->set('document', array());
			}*/
			$fw->set('nomer', $mcollection['nomer']);
			$fw->set('jam', date('H:i:s', $mcollection['jam']));
			$fw->set('cabang', $mcollection['cabang']);
			$fw->set('debit', $mcollection['debit']);
			$fw->set('kredit', $mcollection['kredit']);
			$fw->set('nomor_bukti', $mcollection['nomor_bukti']);
		}
		
		$fw->set('link', '/welcome/edit?id='.$id);
		
		$ww = View::instance()->render("welcome/add.php"); 
		echo $ww;
		
	}

	public function laporan()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$db = $m->karyawan;
		$ag = $db->jurnal;
					
		$blncari = date('n', time());
		$thncari = date('Y', time());
		//$tglcari = date('d', time());
		
		$data = $ag->find();
		
		if (!empty($_POST))
		{	
			//submit
			$blncari = $fw->get("POST.blncari");
			$thncari = $fw->get("POST.thncari");
			//$tglcari = $fw->get("POST.tglcari");
			
			$bbcari = $blncari;
			if(strlen($bbcari) == 1)
				$bbcari = '0'.$blncari;
			
			$start = strtotime($thncari.'-'.$bbcari.'-01 00:00:00');
			$end = strtotime('+1 month', $start);//
			
			//$dtgl = explode('-', $tglcari);
			//$start = strtotime($dtgl[2].'-'.$dtgl[1].'-'.$dtgl[0].' 00:00:00');		
			//$end = strtotime('+1 day', $start);
				
			$data = $ag->find(array('tanggal' => array('$lt' => $end, '$gt' => $start)));
		}	
		$fw->set('data', $data);
		
		$fw->set('blncari', $blncari);
		$fw->set('thncari', $thncari);
		//$fw->set('tglcari', $tglcari);
		
		$fw->set('link', '/welcome/laporan');
		
		$ww = View::instance()->render('welcome/laporan.php'); 
		echo $ww;
		
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$m = new MongoClient();
		$_id = $_GET['id'];
		
		$db = $m->karyawan;
		$collection = $db->jurnal;
		$collection->remove(array('_id' => new MongoId($_id)));
		$fw->reroute('/welcome/index');
		
	}
	 
}
