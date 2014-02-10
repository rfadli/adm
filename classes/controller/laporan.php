<?php
/*class laporan
{
	
	public function index()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{	
			//submit
			$bulan = $fw->get("POST.bulan");
			$tahun = $fw->get("POST.tahun");
			
			$adaygsalah = TRUE;
			
			if (!$adaygsalah)
			{
				$fw->set('bulan', $bulan);
				$fw->set('tahun', $tahun);
			}
			
			if($adaygsalah)
			{
				$m = new MongoClient();
				$db = $m->karyawan;
				$collection = $db->laporan;
				
				$data = array(
					'bulan' => $bulan,
					'tahun' => $tahun,
				);
				
				$collection->insert($data);
				$fw->reroute("/laporan/index");
			}
			
		}
		else
		{	
			$fw->set('bulan', '');
			$fw->set('tahun', '');
		}
		$fw->set('link', "/laporan/index");
		
		$ww = View::instance()->render("laporan/index.php"); 
		echo $ww;
	}
	
}*/
?>