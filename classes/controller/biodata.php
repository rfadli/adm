<?php

class biodata
{

	public function index()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$bio = $db->biodata;
		
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$limit_doc = 6;
		$skip  = (int)(($page - 1) * $limit_doc);
		$next  = ($page + 1);
		$prev  = ($page - 1);
		
		$data = $bio->find()->skip($skip)->limit($limit_doc)->sort(array("nama" => -1));
		
		$fw->set('data', $data);	
		$fw->set('page', $page);
		$fw->set('limit_doc', $limit_doc);
		$fw->set('skip', $skip);
		$fw->set('next', $next);
		$fw->set('prev', $prev);
		
		$fw->set('link', "biodata/index?page=".$page);
		
		$view = View::instance()->render("biodata/index.php"); 
		echo $view;
	}

	public function add()
	{
		$fw = Base::instance();
		
		if (!empty($_POST))
		{
			//echo $_FILES['foto']['name'];
			//die;
			$no = $fw->get("POST.no");
			$surat_kontrak = $fw->get("POST.surat_kontrak");
			$no_npwp = $fw->get("POST.no_npwp");
			$golongan_darah = $fw->get("POST.golongan_darah");
			$pendidikan_terakhir = $fw->get("POST.pendidikan_terakhir");
			$status_pegawai = $fw->get("POST.status_pegawai");
			$gaji_pokok = $fw->get("POST.gaji_pokok");
			$tanggal = $fw->get("POST.tanggal");
			$tahun_kerja = $fw->get("POST.tahun_kerja");
			$bulan_kerja = $fw->get("POST.bulan_kerja");
			$nama = $fw->get("POST.nama");
			$alamat = $fw->get("POST.alamat");
			$tlahir = $fw->get("POST.tlahir");
			$kota = $fw->get("POST.kota");
			$prov = $fw->get("POST.prov");
			$kd_pos = $fw->get("POST.kd_pos");
			$negara = $fw->get("POST.negara");
			$birthday = $fw->get("POST.birthday");
			$bulan = $fw->get("POST.bulan");
			$agama = $fw->get("POST.agama");
			$jenis_kelamin = $fw->get("POST.jenis_kelamin");
			$jabatan = $fw->get("POST.jabatan");
			$departement = $fw->get("POST.departement");
			$email = $fw->get("POST.email");
			$norek = $fw->get("POST.norek");
			$bank = $fw->get("POST.bank");
			$cabang = $fw->get("POST.cabang");
			$kawin = $fw->get("POST.kawin");
			$telp = $fw->get("POST.telp");
			$work_in = $fw->get("POST.work_in");
			$foto = $_FILES['foto']['name'];
			//data ortu
			$nm_ayah = $fw->get("POST.nm_ayah");
			$nm_ibu = $fw->get("POST.nm_ibu");
			$alamat_ortu = $fw->get("POST.alamat_ortu");
			$work_ayah = $fw->get("POST.work_ayah");
			$work_ibu = $fw->get("POST.work_ibu");
			$education_ayah = $fw->get("POST.education_ayah");
			$education_ibu = $fw->get("POST.education_ibu");
			//data keluarga
			$nm_istri = $fw->get("POST.nm_istri");
			$umur = $fw->get("POST.umur");
			$pendidikan = $fw->get("POST.pendidikan");
			$jobs = $fw->get("POST.jobs");
			$jml_anak = $fw->get("POST.jml_anak");
			
			$nm_anak_1 = $fw->get("POST.nm_anak_1");
			$nm_anak_2 = $fw->get("POST.nm_anak_2");
			$nm_anak_3 = $fw->get("POST.nm_anak_3");
			$nm_anak_4 = $fw->get("POST.nm_anak_4");
			$umur_anak_1 = $fw->get("POST.umur_anak_1");
			$umur_anak_2 = $fw->get("POST.umur_anak_2");
			$umur_anak_3 = $fw->get("POST.umur_anak_3");
			$umur_anak_4 = $fw->get("POST.umur_anak_4");
			$pendidikan_anak_1 = $fw->get("POST.pendidikan_anak_1");
			$pendidikan_anak_2 = $fw->get("POST.pendidikan_anak_2");
			$pendidikan_anak_3 = $fw->get("POST.pendidikan_anak_3");
			$pendidikan_anak_4 = $fw->get("POST.pendidikan_anak_4");
			$jenis_kelamin_anak_1 = $fw->get("POST.jenis_kelamin_anak_1");
			$jenis_kelamin_anak_2 = $fw->get("POST.jenis_kelamin_anak_2");
			$jenis_kelamin_anak_3 = $fw->get("POST.jenis_kelamin_anak_3");
			$jenis_kelamin_anak_4 = $fw->get("POST.jenis_kelamin_anak_4");
			
			//---------blok pemeriksaan-------------//
			
			$datakaryawan = TRUE;
			
			/*if(strlen(trim($nik == 0)))
			{
				$datakaryawan = FALSE;
				$fw->set('error_nik', " *NIK harus di isi");
			}
			if(strlen(trim($nik)) > 0)
			{
				if(!is_numeric($nik))
				{
					$datakaryawan = FALSE;
					$fw->set('error_nik', " *Harus di isi angka");
				}
			}*/
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_nama', " *Nama harus di isi");
			}
			
			if($alamat == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_alamat', " *Alamat harus di isi");
			}
			
			if($tlahir == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_tlahir', " *TTL harus di isi");
			}
			
			if($kota == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_kota', " *Kota harus di isi");
			}
			
			if($prov == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_prov', " *Provinsi harus di isi");
			}
			
			if(strlen(trim($kd_pos)) > 0)
			{
				if(!is_numeric($kd_pos))
				{
					$datakaryawan = FALSE;
					$fw->set('error_kdpos', " *Harus di isi angka");
				}
			}
			
			if($negara == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_negara', " *Kewarganegaraan harus di isi");
			}
			
			if($birthday == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_birth', " *TTL harus di isi");
			}
			
			if($bulan == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_agama', " *Agama harus di isi");
			}
			
			if($agama == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_agama', " *Agama harus di isi");
			}
			
			if($jabatan == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_jabatan', " *Jabatan harus di isi");
			}
			
			if($departement == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_dept', " *Departement harus di isi");
			}
			
			if(strlen(trim($telp)) > 0)
			{
				if(!is_numeric($telp))
				{
					$datakaryawan = FALSE;
					$fw->set('error_telp', " *Harus di isi angka");
				}
			}
			
			if($email == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_mail', " *Email harus di isi");
			}
			
			if($work_in == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_work', " *Mulai Kerja harus di isi");
			}
			if(strlen(trim($gaji_pokok)) > 0)
			{
				if(!is_numeric($gaji_pokok))
				{
					$datakaryawan = FALSE;
					$fw->set('error_gaji_pokok', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_1)) > 0)
			{
				if(!is_numeric($umur_anak_1))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_1', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_2)) > 0)
			{
				if(!is_numeric($umur_anak_2))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_2', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_3)) > 0)
			{
				if(!is_numeric($umur_anak_3))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_3', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_4)) > 0)
			{
				if(!is_numeric($umur_anak_4))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_4', " *Harus di isi angka");
				}
			}
			/*
			if($foto == '')
			{
				$datakaryawan = FALSE;
				
				$error_foto = " *Foto harus di isi";
				$fw->set('error_foto', $error_foto);
			}
			*/
			//----------blok pemilihan--------------//
		
		$target_path = "upload/foto/";

		$target_path = $target_path . basename( $_FILES['foto']['name']); 
		//echo $target_path;exit;
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path))
		{
		    basename( $_FILES['foto']['name']);
		} 
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('no', $no);
				$fw->set('surat_kontrak', $surat_kontrak);
				$fw->set('no_npwp', $no_npwp);
				$fw->set('golongan_darah', $golongan_darah);
				$fw->set('pendidikan_terakhir', $pendidikan_terakhir);
				$fw->set('status_pegawai', $status_pegawai);
				$fw->set('gaji_pokok', $gaji_pokok);
				$fw->set('tanggal', $tanggal);
				$fw->set('bulan_kerja', $bulan_kerja);
				$fw->set('tahun_kerja', $tahun_kerja);
				$fw->set('nama', $nama);
				$fw->set('alamat', $alamat);
				$fw->set('kota', $kota);
				$fw->set('prov', $prov);
				$fw->set('kd_pos', $kd_pos);
				$fw->set('negara', $negara);
				$fw->set('tlahir', $tlahir);
				$fw->set('birthday', $birthday);
				$fw->set('jenis_kelamin', $jenis_kelamin);
				$fw->set('bulan', $bulan);
				$fw->set('agama', $agama);
				$fw->set('jabatan', $jabatan);
				$fw->set('departement', $departement);
				$fw->set('email', $email);
				$fw->set('norek', $norek);
				$fw->set('bank', $bank);
				$fw->set('cabang', $cabang);
				$fw->set('kawin', $kawin);
				$fw->set('telp', $telp);
				$fw->set('work_in', $work_in);
				$fw->set('foto', $_FILES['foto']['name']);
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				$fw->set('status', $status);
				// data ortu
				$fw->set('nm_ayah', $nm_ayah);
				$fw->set('nm_ibu', $nm_ibu);
				$fw->set('alamat_ortu', $alamat_ortu);
				$fw->set('work_ayah', $work_ayah);
				$fw->set('work_ibu', $work_ibu);
				$fw->set('education_ayah', $education_ayah);
				$fw->set('education_ibu', $education_ibu);
				// data keluarga
				$fw->set('nm_istri', $nm_istri);
				$fw->set('umur', $umur);
				$fw->set('pendidikan', $pendidikan);
				$fw->set('jobs', $jobs);
				$fw->set('jml_anak', $jml_anak);
				
				$fw->set('nm_anak_1', $nm_anak_1);
				$fw->set('nm_anak_2', $nm_anak_2);
				$fw->set('nm_anak_3', $nm_anak_3);
				$fw->set('nm_anak_4', $nm_anak_4);
				$fw->set('umur_anak_1', $umur_anak_1);
				$fw->set('umur_anak_2', $umur_anak_2);
				$fw->set('umur_anak_3', $umur_anak_3);
				$fw->set('umur_anak_4', $umur_anak_4);
				$fw->set('pendidikan_anak_1', $pendidikan_anak_1);
				$fw->set('pendidikan_anak_2', $pendidikan_anak_2);
				$fw->set('pendidikan_anak_3', $pendidikan_anak_3);
				$fw->set('pendidikan_anak_4', $pendidikan_anak_4);
				$fw->set('jenis_kelamin_anak_1', $jenis_kelamin_anak_1);
				$fw->set('jenis_kelamin_anak_2', $jenis_kelamin_anak_2);
				$fw->set('jenis_kelamin_anak_3', $jenis_kelamin_anak_3);
				$fw->set('jenis_kelamin_anak_4', $jenis_kelamin_anak_4);
				
			}
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				
				$local = new MongoClient();
				$db = $local->karyawan;
				
				$collection = $db->jabatan;
				$mcollection = $collection->findOne(array('_id' => new MongoId($_POST['jabatan'])));
				
				$dept = $db->departement;
				$mdept = $dept->findOne(array('_id' => new MongoId($_POST['departement'])));
				
				$ag = $db->agama;
				$sag = $ag->findOne(array('_id' => new MongoId($_POST['agama'])));
				
				$bul = $db->bulan;
				$mbul = $bul->findOne(array('_id' => new MongoId($_POST['bulan'])));
				
				$mstatpeg = $db->status_pegawai;
				$mstatpegm = $mstatpeg->findOne(array('_id' => new MongoId($_POST['status_pegawai'])));
				
				/*$bull = $db->bulan;
				$mbull = $bull->findOne(array('_id' => new MongoId($_POST['bulan_kerja'])));*/
				
				$bio = $db->biodata;
				$data = array (
					'no' => $no,
					'surat_kontrak' => $surat_kontrak,
					'no_npwp' => $no_npwp,
					'golongan_darah' => $golongan_darah,
					'pendidikan_terakhir' => $pendidikan_terakhir,
					'status_pegawi' => new MongoId($fw->get("POST.status_pegawai")),
					'tanggal' => $tanggal,
					'nama' => $nama,
					'alamat' => $alamat,
					'kota' => $kota,
					'prov' => $prov,
					'kd_pos' => $kd_pos,
					'negara' => $negara,
					'tlahir' => $tlahir,
					'birthday' => $birthday,
					'bulan' => new MongoID($fw->get("POST.bulan")),
					//'bulan' => $bulan,
					'agama' => new MongoID($fw->get("POST.agama")),
					'jenis_kelamin' => $jenis_kelamin,
					'jabatan' => new MongoID($fw->get("POST.jabatan")),
					'departement' => new MongoID($fw->get("POST.departement")),
					'gaji_pokok' => $gaji_pokok,
					'email' => $email,
					'norek' => $norek,
					'bank' => $bank,
					'cabang' => $cabang,
					'kawin' => $kawin,
					'telephone' => $telp,
					'work_in' => $work_in,
					//'bulan_kerja' => new MongoID($fw->get("POST.bulan_kerja")),
					'bulan_kerja' => $bulan_kerja,
					'tahun_kerja' => $tahun_kerja,
					'status' => $status,
					//data ortu
					'nm_ayah' => $nm_ayah,
					'nm_ibu' => $nm_ibu,
					'alamat_ortu' => $alamat_ortu,
					'work_ayah' => $work_ayah,
					'work_ibu' => $work_ibu,
					'education_ayah' => $education_ayah,
					'education_ibu' => $education_ibu,
					//data keluarga
					'nm_istri' => $nm_istri,
					'umur' => $umur,
					'pendidikan' => $pendidikan,
					'jobs' => $jobs,
					'jml_anak' => $jml_anak,
					//anak1
					'nm_anak_1' => $nm_anak_1,
					'umur_anak_1' => $umur_anak_1,
					'pendidikan_anak_1' => $pendidikan_anak_1,
					'jenis_kelamin_anak_1' => $jenis_kelamin_anak_1,
					//anak 2
					'nm_anak_2' => $nm_anak_2,
					'umur_anak_2' => $umur_anak_2,
					'pendidikan_anak_2' => $pendidikan_anak_2,
					'jenis_kelamin_anak_2' => $jenis_kelamin_anak_2,
					//anak 3
					'nm_anak_3' => $nm_anak_3,
					'umur_anak_3' => $umur_anak_3,
					'pendidikan_anak_3' => $pendidikan_anak_3,
					'jenis_kelamin_anak_3' => $jenis_kelamin_anak_3,
					//anak 4
					'nm_anak_4' => $nm_anak_4,
					'umur_anak_4' => $umur_anak_4,
					'pendidikan_anak_4' => $pendidikan_anak_4,
					'jenis_kelamin_anak_4' => $jenis_kelamin_anak_4,
					
					'foto' => $foto,
					
				);
				$bio->insert($data);
				$fw->reroute("/biodata/index");
			}
			
		}
		else
		{
			$fw->set('no', '');
			$fw->set('surat_kontrak', '');
			$fw->set('no_npwp', '');
			$fw->set('golongan_darah', '');
			$fw->set('pendidikan_terakhir', '');
			$fw->set('status_pegawai', '');
			$fw->set('gaji_pokok', '');
			$fw->set('tanggal', '');
			$fw->set('bulan_kerja', '');
			$fw->set('tahun_kerja', '');
			$fw->set('nama', '');
			$fw->set('alamat', '');
			$fw->set('kota', '');
			$fw->set('prov', '');
			$fw->set('kd_pos', '');
			$fw->set('negara', '');
			$fw->set('tlahir', '');
			$fw->set('birthday', '');
			$fw->set('bulan', '');
			$fw->set('agama', '');
			$fw->set('jenis_kelamin', '');
			$fw->set('jabatan', '');
			$fw->set('departement', '');
			$fw->set('email', '');
			$fw->set('norek', '');
			$fw->set('bank', '');
			$fw->set('cabang', '');
			$fw->set('kawin', '');
			$fw->set('telp', '');
			$fw->set('work_in', '');
			$fw->set('foto', '');
			$fw->set('status', '');
			//data ortu
			$fw->set('nm_ayah', '');
			$fw->set('nm_ibu', '');
			$fw->set('alamat_ortu', '');
			$fw->set('work_ayah', '');
			$fw->set('work_ibu', '');
			$fw->set('education_ayah', '');
			$fw->set('education_ibu', '');
			//data keluarga
			$fw->set('nm_istri', '');
			$fw->set('umur', '');
			$fw->set('pendidikan', '');
			$fw->set('jobs', '');
			$fw->set('jml_anak', '');
			//
			$fw->set('nm_anak_1', '');
			$fw->set('nm_anak_2', '');
			$fw->set('nm_anak_3', '');
			$fw->set('nm_anak_4', '');
			$fw->set('umur_anak_1', '');
			$fw->set('umur_anak_2', '');
			$fw->set('umur_anak_3', '');
			$fw->set('umur_anak_4', '');
			$fw->set('pendidikan_anak_1', '');
			$fw->set('pendidikan_anak_2', '');
			$fw->set('pendidikan_anak_3', '');
			$fw->set('pendidikan_anak_4', '');
			$fw->set('jenis_kelamin_anak_1', '');
			$fw->set('jenis_kelamin_anak_2', '');
			$fw->set('jenis_kelamin_anak_3', '');
			$fw->set('jenis_kelamin_anak_4', '');
		}
		
		$fw->set("link", '/biodata/add');
		
		$view = View::instance()->render("biodata/add.php"); 
		echo $view;
		
	}

	public function edit()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$bio = $db->biodata;
		$mbio = $bio->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$no = $fw->get("POST.no");
			$surat_kontrak = $fw->get("POST.surat_kontrak");
			$no_npwp = $fw->get("POST.no_npwp");
			$golongan_darah = $fw->get("POST.golongan_darah");
			$pendidikan_terakhir = $fw->get("POST.pendidikan_terakhir");
			$status_pegawai = $fw->get("POST.status_pegawai");
			$gaji_pokok = $fw->get("POST.gaji_pokok");
			$tanggal = $fw->get("POST.tanggal");
			$bulan_kerja = $fw->get("POST.bulan_kerja");
			$tahun_kerja = $fw->get("POST.tahun_kerja");
			$nama = $fw->get("POST.nama");
			$alamat = $fw->get("POST.alamat");
			$tlahir = $fw->get("POST.tlahir");
			$kota = $fw->get("POST.kota");
			$prov = $fw->get("POST.prov");
			$kd_pos = $fw->get("POST.kd_pos");
			$negara = $fw->get("POST.negara");
			$birthday = $fw->get("POST.birthday");
			$bulan = $fw->get("POST.bulan");
			$agama = $fw->get("POST.agama");
			$jenis_kelamin = $fw->get("POST.jenis_kelamin");
			$jabatan = $fw->get("POST.jabatan");
			$departement = $fw->get("POST.departement");
			$email = $fw->get("POST.email");
			$norek = $fw->get("POST.norek");
			$bank = $fw->get("POST.bank");
			$cabang = $fw->get("POST.cabang");
			$kawin = $fw->get("POST.kawin");
			$telp = $fw->get("POST.telp");
			$work_in = $fw->get("POST.work_in");
			$foto = $_FILES['foto']['name'];
			//data ortu
			$nm_ayah = $fw->get("POST.nm_ayah");
			$nm_ibu = $fw->get("POST.nm_ibu");
			$alamat_ortu = $fw->get("POST.alamat_ortu");
			$work_ayah = $fw->get("POST.work_ayah");
			$work_ibu = $fw->get("POST.work_ibu");
			$education_ayah = $fw->get("POST.education_ayah");
			$education_ibu = $fw->get("POST.education_ibu");
			//data keluarga
			$nm_istri = $fw->get("POST.nm_istri");
			$umur = $fw->get("POST.umur");
			$pendidikan = $fw->get("POST.pendidikan");
			$jobs = $fw->get("POST.jobs");
			$jml_anak = $fw->get("POST.jml_anak");
			
			$nm_anak_1 = $fw->get("POST.nm_anak_1");
			$nm_anak_2 = $fw->get("POST.nm_anak_2");
			$nm_anak_3 = $fw->get("POST.nm_anak_3");
			$nm_anak_4 = $fw->get("POST.nm_anak_4");
			$umur_anak_1 = $fw->get("POST.umur_anak_1");
			$umur_anak_2 = $fw->get("POST.umur_anak_2");
			$umur_anak_3 = $fw->get("POST.umur_anak_3");
			$umur_anak_4 = $fw->get("POST.umur_anak_4");
			$pendidikan_anak_1 = $fw->get("POST.pendidikan_anak_1");
			$pendidikan_anak_2 = $fw->get("POST.pendidikan_anak_2");
			$pendidikan_anak_3 = $fw->get("POST.pendidikan_anak_3");
			$pendidikan_anak_4 = $fw->get("POST.pendidikan_anak_4");
			$jenis_kelamin_anak_1 = $fw->get("POST.jenis_kelamin_anak_1");
			$jenis_kelamin_anak_2 = $fw->get("POST.jenis_kelamin_anak_2");
			$jenis_kelamin_anak_3 = $fw->get("POST.jenis_kelamin_anak_3");
			$jenis_kelamin_anak_4 = $fw->get("POST.jenis_kelamin_anak_4");
				
			//---------blok pemeriksaan-------------//
			$datakaryawan = TRUE;
			
			/*if($nik == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_nik', " *NIK harus di isi");
			}*/
			
			if($nama == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_nama', " *Nama harus di isi");
			}
			
			if($alamat == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_alamat', " *Alamat harus di isi");
			}
			
			if($tlahir == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_tlahir', " *TTL harus di isi");
			}
			
			if($kota == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_kota', " *Kota harus di isi");
			}
			
			if($prov == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_prov', " *Provinsi harus di isi");
			}
			
			if($negara == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_negara', " *Kewarganegaraan harus di isi");
			}
			
			if($birthday == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_birth', " *TTL harus di isi");
			}
			
			if($bulan == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_agama', " *Agama harus di isi");
			}
			
			if($agama == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_agama', " *Agama harus di isi");
			}
			
			if($jabatan == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_jabatan', " *Jabatan harus di isi");
			}
			
			if($departement == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_dept', " *Departement harus di isi");
			}
			
			if($email == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_mail', " *Email harus di isi");
			}
			
			if($work_in == '')
			{
				$datakaryawan = FALSE;
				$fw->set('error_work', " *Mulai Kerja harus di isi");
			}
			if(strlen(trim($gaji_pokok)) > 0)
			{
				if(!is_numeric($gaji_pokok))
				{
					$datakaryawan = FALSE;
					$fw->set('error_gaji_pokok', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_1)) > 0)
			{
				if(!is_numeric($umur_anak_1))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_1', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_2)) > 0)
			{
				if(!is_numeric($umur_anak_2))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_2', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_3)) > 0)
			{
				if(!is_numeric($umur_anak_3))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_3', " *Harus di isi angka");
				}
			}
			if(strlen(trim($umur_anak_4)) > 0)
			{
				if(!is_numeric($umur_anak_4))
				{
					$datakaryawan = FALSE;
					$fw->set('error_anak_4', " *Harus di isi angka");
				}
			}
			/*
			if($foto == '')
			{
				$datakaryawan = FALSE;
				
				$error_foto = " *Foto harus di isi";
				$fw->set('error_foto', $error_foto);
			}
			*/
			//----------blok pemilihan--------------//
			
			$target_path = "upload/foto/";

			$target_path = $target_path . basename( $_FILES['foto']['name']); 
			
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path))
			{
			    basename( $_FILES['foto']['name']);
			} 
			
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('no', $no);
				$fw->set('surat_kontrak', $surat_kontrak);
				$fw->set('no_npwp', $no_npwp);
				$fw->set('golongan_darah', $golongan_darah);
				$fw->set('pendidikan_terakhir', $pendidikan_terakhir);
				$fw->set('status_pegawai', $status_pegawai);
				$fw->set('gaji_pokok', $gaji_pokok);
				$fw->set('tanggal', $tanggal);
				$fw->set('bulan_kerja', $bulan_kerja);
				$fw->set('tahun_kerja', $tahun_kerja);
				$fw->set('nama', $nama);
				$fw->set('alamat', $alamat);
				$fw->set('tlahir', $tlahir);
				$fw->set('kota', $kota);
				$fw->set('prov', $prov);
				$fw->set('kd_pos', $kd_pos);
				$fw->set('negara', $negara);
				$fw->set('birthday', $birthday);
				$fw->set('bulan', $bulan);
				$fw->set('agama', $agama);
				$fw->set('jenis_kelamin', $jenis_kelamin);
				$fw->set('jabatan', $jabatan);
				$fw->set('departement', $departement);
				$fw->set('email', $email);
				$fw->set('norek', $norek);
				$fw->set('bank', $bank);
				$fw->set('cabang', $cabang);
				$fw->set('kawin', $kawin);
				$fw->set('telp', $telp);
				$fw->set('work_in', $work_in);
				$fw->set('foto', $_FILES['foto']['name']);
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				// data ortu
				$fw->set('nm_ayah', $nm_ayah);
				$fw->set('nm_ibu', $nm_ibu);
				$fw->set('alamat_ortu', $alamat_ortu);
				$fw->set('work_ayah', $work_ayah);
				$fw->set('work_ibu', $work_ibu);
				$fw->set('education_ayah', $education_ayah);
				$fw->set('education_ibu', $education_ibu);
				// data keluarga
				$fw->set('nm_istri', $nm_istri);
				$fw->set('umur', $umur);
				$fw->set('pendidikan', $pendidikan);
				$fw->set('jobs', $jobs);
				$fw->set('jml_anak', $jml_anak);
				//
				$fw->set('nm_anak_1', $nm_anak_1);
				$fw->set('nm_anak_2', $nm_anak_2);
				$fw->set('nm_anak_3', $nm_anak_3);
				$fw->set('nm_anak_4', $nm_anak_4);
				$fw->set('umur_anak_1', $umur_anak_1);
				$fw->set('umur_anak_2', $umur_anak_2);
				$fw->set('umur_anak_3', $umur_anak_3);
				$fw->set('umur_anak_4', $umur_anak_4);
				$fw->set('pendidikan_anak_1', $pendidikan_anak_1);
				$fw->set('pendidikan_anak_2', $pendidikan_anak_2);
				$fw->set('pendidikan_anak_3', $pendidikan_anak_3);
				$fw->set('pendidikan_anak_4', $pendidikan_anak_4);
				$fw->set('jenis_kelamin_anak_1', $jenis_kelamin_anak_1);
				$fw->set('jenis_kelamin_anak_2', $jenis_kelamin_anak_2);
				$fw->set('jenis_kelamin_anak_3', $jenis_kelamin_anak_3);
				$fw->set('jenis_kelamin_anak_4', $jenis_kelamin_anak_4);
			}
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				
				$local = new MongoClient();
				$db = $local->karyawan;
				
				$collection = $db->jabatan;
				$mcollection = $collection->findOne(array('_id' => new MongoId($_POST['jabatan'])));
				
				$dept = $db->departement;
				$mdept = $dept->findOne(array('_id' => new MongoId($_POST['departement'])));
				
				$ag = $db->agama;
				$sag = $ag->findOne(array('_id' => new MongoId($_POST['agama'])));
				
				$bul = $db->bulan;
				$mbul = $bul->findOne(array('_id' => new MongoId($_POST['bulan'])));
				
				$mstatpeg = $db->status_pegawai;
				$mstatpegm = $mstatpeg->findOne(array('_id' => new MongoId($_POST['status_pegawai'])));
				
				/*$bull = $db->bulan;
				$mbull = $bull->findOne(array('_id' => new MongoId($_POST['bulan_kerja'])));*/
				
				$bio = $db->biodata;
				$data = array (
					'no' => $no,
					'surat_kontrak' => $surat_kontrak,
					'no_npwp' => $no_npwp,
					'golongan_darah' => $golongan_darah,
					'pendidikan_terakhir' => $pendidikan_terakhir,
					'status_pegawai' => new MongoId($fw->get('POST.status_pegawai')),
					'tanggal' => $tanggal,
					'nama' => $nama,
					'alamat' => $alamat,
					'tlahir' => $tlahir,
					'kota' => $kota,
					'prov' => $prov,
					'kd_pos' => $kd_pos,
					'negara' => $negara,
					'birthday' => $birthday,
					'bulan' => new MongoId($fw->get('POST.bulan')),
					//'bulan' => $bulan,
					'agama' => new MongoId($fw->get('POST.agama')),
					'jenis_kelamin' => $jenis_kelamin,
					'jabatan' => new MongoID($fw->get('POST.jabatan')),
					'departement' => new MongoID($fw->get('POST.departement')),
					'gaji_pokok' => $gaji_pokok,
					'email' => $email,
					'norek' => $norek,
					'bank' => $bank,
					'cabang' => $cabang,
					'kawin' => $kawin,
					'telephone' => $telp,
					'work_in' => $work_in,
					//'bulan_kerja' => new MongoId($fw->get('POST.bulan_kerja')),
					'bulan_kerja' => $bulan_kerja,
					'tahun_kerja' => $tahun_kerja,
					'status' => $status,
					//data ortu
					'nm_ayah' => $nm_ayah,
					'nm_ibu' => $nm_ibu,
					'alamat_ortu' => $alamat_ortu,
					'work_ayah' => $work_ayah,
					'work_ibu' => $work_ibu,
					'education_ayah' => $education_ayah,
					'education_ibu' => $education_ibu,
					//data keluarga
					'nm_istri' => $nm_istri,
					'umur' => $umur,
					'pendidikan' => $pendidikan,
					'jobs' => $jobs,
					'jml_anak' => $jml_anak,
					//anak1
					'nm_anak_1' => $nm_anak_1,
					'umur_anak_1' => $umur_anak_1,
					'pendidikan_anak_1' => $pendidikan_anak_1,
					'jenis_kelamin_anak_1' => $jenis_kelamin_anak_1,
					//anak 2
					'nm_anak_2' => $nm_anak_2,
					'umur_anak_2' => $umur_anak_2,
					'pendidikan_anak_2' => $pendidikan_anak_2,
					'jenis_kelamin_anak_2' => $jenis_kelamin_anak_2,
					//anak 3
					'nm_anak_3' => $nm_anak_3,
					'umur_anak_3' => $umur_anak_3,
					'pendidikan_anak_3' => $pendidikan_anak_3,
					'jenis_kelamin_anak_3' => $jenis_kelamin_anak_3,
					//anak 4
					'nm_anak_4' => $nm_anak_4,
					'umur_anak_4' => $umur_anak_4,
					'pendidikan_anak_4' => $pendidikan_anak_4,
					'jenis_kelamin_anak_4' => $jenis_kelamin_anak_4,
					
					'foto' => $foto,
				);
				$newdata = array('$set' => $data);
				$bio->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/biodata/index");
			}
			
		}
		else
		{
			$fw->set('no', $mbio['no']);
			$fw->set('surat_kontrak', $mbio['surat_kontrak']);
			$fw->set('no_npwp', $mbio['no_npwp']);
			$fw->set('golongan_darah', $mbio['golongan_darah']);
			$fw->set('pendidikan_terakhir', $mbio['pendidikan_terakhir']);
			//$fw->set('status_pegawai', $mbio['status_pegawai']);
			if(isset($mbio['status_pegawai']))
				$fw->set('status_pegawai', $mbio['status_pegawai']);
			else {
				$fw->set('status_pegawai', '');
			}
			$fw->set('gaji_pokok', $mbio['gaji_pokok']);
			$fw->set('tanggal', $mbio['tanggal']);
			$fw->set('bulan_kerja', $mbio['bulan_kerja']);
			$fw->set('tahun_kerja', $mbio['tahun_kerja']);
			$fw->set('nama', $mbio['nama']);
			$fw->set('alamat', $mbio['alamat']);
			$fw->set('tlahir', $mbio['tlahir']);
			$fw->set('kota', $mbio['kota']);
			$fw->set('prov', $mbio['prov']);
			$fw->set('kd_pos', $mbio['kd_pos']);
			$fw->set('negara', $mbio['negara']);
			$fw->set('birthday', $mbio['birthday']);
			$fw->set('bulan', $mbio['bulan']);
			$fw->set('agama', $mbio['agama']);
			$fw->set('jenis_kelamin', $mbio['jenis_kelamin']);
			$fw->set('jabatan', $mbio['jabatan']);
			$fw->set('departement', $mbio['departement']);
			$fw->set('email', $mbio['email']);
			$fw->set('norek', $mbio['norek']);
			$fw->set('bank', $mbio['bank']);
			$fw->set('cabang', $mbio['cabang']);
			$fw->set('kawin', $mbio['kawin']);
			$fw->set('telp', $mbio['telephone']);
			$fw->set('work_in', $mbio['work_in']);
			$fw->set('foto', $mbio['foto']);
			if(isset($mbio['status']))
				$fw->set('status', $mbio['status']);
			else {
				$fw->set('status', '');
			}
			//data ortu
			$fw->set('nm_ayah', $mbio['nm_ayah']);
			$fw->set('nm_ibu', $mbio['nm_ibu']);
			$fw->set('alamat_ortu', $mbio['alamat_ortu']);
			$fw->set('work_ayah', $mbio['work_ayah']);
			$fw->set('work_ibu', $mbio['work_ibu']);
			$fw->set('education_ayah', $mbio['education_ayah']);
			$fw->set('education_ibu', $mbio['education_ibu']);
			//data keluarga
			$fw->set('nm_istri', $mbio['nm_istri']);
			$fw->set('umur', $mbio['umur']);
			$fw->set('pendidikan', $mbio['pendidikan']);
			$fw->set('jobs', $mbio['jobs']);
			$fw->set('jml_anak', $mbio['jml_anak']);
			//
			$fw->set('nm_anak_1', $mbio['nm_anak_1']);
			$fw->set('nm_anak_2', $mbio['nm_anak_2']);
			$fw->set('nm_anak_3', $mbio['nm_anak_3']);
			$fw->set('nm_anak_4', $mbio['nm_anak_4']);
			$fw->set('umur_anak_1', $mbio['umur_anak_1']);
			$fw->set('umur_anak_2', $mbio['umur_anak_2']);
			$fw->set('umur_anak_3', $mbio['umur_anak_3']);
			$fw->set('umur_anak_4', $mbio['umur_anak_4']);
			$fw->set('pendidikan_anak_1', $mbio['pendidikan_anak_1']);
			$fw->set('pendidikan_anak_2', $mbio['pendidikan_anak_2']);
			$fw->set('pendidikan_anak_3', $mbio['pendidikan_anak_3']);
			$fw->set('pendidikan_anak_4', $mbio['pendidikan_anak_4']);
			$fw->set('jenis_kelamin_anak_1', $mbio['jenis_kelamin_anak_1']);
			$fw->set('jenis_kelamin_anak_2', $mbio['jenis_kelamin_anak_2']);
			$fw->set('jenis_kelamin_anak_3', $mbio['jenis_kelamin_anak_3']);
			$fw->set('jenis_kelamin_anak_4', $mbio['jenis_kelamin_anak_4']);
		}
		
		$fw->set("link", '/biodata/edit?id='.$id);
		
		$view = View::instance()->render("biodata/add.php"); 
		echo $view;
	}
	
	public function detail()
	{
		$fw = Base::instance();
		
		$id = $fw->get('GET["id"]');
		
		$local = new MongoClient();
		$db = $local->karyawan;
		$bio = $db->biodata;
		$mbio = $bio->findOne(array('_id' => new MongoId($id)));
		
		if (!empty($_POST))
		{
			$no = $fw->get("POST.no");
			$surat_kontrak = $fw->get("POST.surat_kontrak");
			$no_npwp = $fw->get("POST.no_npwp");
			$golongan_darah = $fw->get("POST.golongan_darah");
			$pendidikan_terakhir = $fw->get("POST.pendidikan_terakhir");
			$status_pegawai = $fw->get("POST.status_pegawai");
			$gaji_pokok = $fw->get("POST.gaji_pokok");
			$tanggal = $fw->get("POST.tanggal");
			$bulan_kerja = $fw->get("POST.bulan_kerja");
			$tahun_kerja = $fw->get("POST.tahun_kerja");
			$nama = $fw->get("POST.nama");
			$alamat = $fw->get("POST.alamat");
			$tlahir = $fw->get("POST.tlahir");
			$kota = $fw->get("POST.kota");
			$prov = $fw->get("POST.prov");
			$kd_pos = $fw->get("POST.kd_pos");
			$negara = $fw->get("POST.negara");
			$birthday = $fw->get("POST.birthday");
			$bulan = $fw->get("POST.bulan");
			$agama = $fw->get("POST.agama");
			$jenis_kelamin = $fw->get("POST.jenis_kelamin");
			$jabatan = $fw->get("POST.jabatan");
			$departement = $fw->get("POST.departement");
			$email = $fw->get("POST.email");
			$norek = $fw->get("POST.norek");
			$bank = $fw->get("POST.bank");
			$cabang = $fw->get("POST.cabang");
			$kawin = $fw->get("POST.kawin");
			$telp = $fw->get("POST.telp");
			$work_in = $fw->get("POST.work_in");
			$foto = $_FILES['foto'];
			//data ortu
			$nm_ayah = $fw->get("POST.nm_ayah");
			$nm_ibu = $fw->get("POST.nm_ibu");
			$alamat_ortu = $fw->get("POST.alamat_ortu");
			$work_ayah = $fw->get("POST.work_ayah");
			$work_ibu = $fw->get("POST.work_ibu");
			$education_ayah = $fw->get("POST.education_ayah");
			$education_ibu = $fw->get("POST.education_ibu");
			//data keluarga
			$nm_istri = $fw->get("POST.nm_istri");
			$umur = $fw->get("POST.umur");
			$pendidikan = $fw->get("POST.pendidikan");
			$jobs = $fw->get("POST.jobs");
			$jml_anak = $fw->get("POST.jml_anak");
			//
			$nm_anak_1 = $fw->get("POST.nm_anak_1");
			$nm_anak_2 = $fw->get("POST.nm_anak_2");
			$nm_anak_3 = $fw->get("POST.nm_anak_3");
			$nm_anak_4 = $fw->get("POST.nm_anak_4");
			$umur_anak_1 = $fw->get("POST.umur_anak_1");
			$umur_anak_2 = $fw->get("POST.umur_anak_2");
			$umur_anak_3 = $fw->get("POST.umur_anak_3");
			$umur_anak_4 = $fw->get("POST.umur_anak_4");
			$pendidikan_anak_1 = $fw->get("POST.pendidikan_anak_1");
			$pendidikan_anak_2 = $fw->get("POST.pendidikan_anak_2");
			$pendidikan_anak_3 = $fw->get("POST.pendidikan_anak_3");
			$pendidikan_anak_4 = $fw->get("POST.pendidikan_anak_4");
			$jenis_kelamin_anak_1 = $fw->get("POST.jenis_kelamin_anak_1");
			$jenis_kelamin_anak_2 = $fw->get("POST.jenis_kelamin_anak_2");
			$jenis_kelamin_anak_3 = $fw->get("POST.jenis_kelamin_anak_3");
			$jenis_kelamin_anak_4 = $fw->get("POST.jenis_kelamin_anak_4");
			//---------blok pemeriksaan-------------//

			$datakaryawan = TRUE;
			
			
			$target_path = "upload/foto/";

			$target_path = $target_path . basename( $_FILES['foto']['name']); 
			
			if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path))
			{
			    basename( $_FILES['foto']['name']);
			} 
			
			//----------blok pemilihan--------------//
			if (!$datakaryawan) // blok yg belum di isi 
			{
				$fw->set('no', $no);
				$fw->set('surat_kontrak', $surat_kontrak);
				$fw->set('no_npwp', $no_npwp);
				$fw->set('golongan_darah', $golongan_darah);
				$fw->set('pendidikan_terakhir', $pendidikan_terakhir);
				$fw->set('status_pegawai', $status_pegawai);
				$fw->set('gaji_pokok', $gaji_pokok);
				$fw->set('tanggal', $tanggal);
				$fw->set('bulan_kerja', $bulan_kerja);
				$fw->set('tahun_kerja', $tahun_kerja);
				$fw->set('nama', $nama);
				$fw->set('alamat', $alamat);
				$fw->set('tlahir', $tlahir);
				$fw->set('kota', $kota);
				$fw->set('prov', $prov);
				$fw->set('kd_pos', $kd_pos);
				$fw->set('negara', $negara);
				$fw->set('birthday', $birthday);
				$fw->set('bulan', $bulan);
				$fw->set('agama', $agama);
				$fw->set('jenis_kelamin', $jenis_kelamin);
				$fw->set('jabatan', $jabatan);
				$fw->set('departement', $departement);
				$fw->set('email', $email);
				$fw->set('norek', $norek);
				$fw->set('bank', $bank);
				$fw->set('cabang', $cabang);
				$fw->set('kawin', $kawin);
				$fw->set('telp', $telp);
				$fw->set('work_in', $work_in);
				$fw->set('foto', $_FILES['foto']['name']);
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				// data ortu
				$fw->set('nm_ayah', $nm_ayah);
				$fw->set('nm_ibu', $nm_ibu);
				$fw->set('alamat_ortu', $alamat_ortu);
				$fw->set('work_ayah', $work_ayah);
				$fw->set('work_ibu', $work_ibu);
				$fw->set('education_ayah', $education_ayah);
				$fw->set('education_ibu', $education_ibu);
				// data keluarga
				$fw->set('nm_istri', $nm_istri);
				$fw->set('umur', $umur);
				$fw->set('pendidikan', $pendidikan);
				$fw->set('jobs', $jobs);
				$fw->set('jml_anak', $jml_anak);
				//
				$fw->set('nm_anak_1', $nm_anak_1);
				$fw->set('nm_anak_2', $nm_anak_2);
				$fw->set('nm_anak_3', $nm_anak_3);
				$fw->set('nm_anak_4', $nm_anak_4);
				$fw->set('umur_anak_1', $umur_anak_1);
				$fw->set('umur_anak_2', $umur_anak_2);
				$fw->set('umur_anak_3', $umur_anak_3);
				$fw->set('umur_anak_4', $umur_anak_4);
				$fw->set('pendidikan_anak_1', $pendidikan_anak_1);
				$fw->set('pendidikan_anak_2', $pendidikan_anak_2);
				$fw->set('pendidikan_anak_3', $pendidikan_anak_3);
				$fw->set('pendidikan_anak_4', $pendidikan_anak_4);
				$fw->set('jenis_kelamin_anak_1', $jenis_kelamin_anak_1);
				$fw->set('jenis_kelamin_anak_2', $jenis_kelamin_anak_2);
				$fw->set('jenis_kelamin_anak_3', $jenis_kelamin_anak_3);
				$fw->set('jenis_kelamin_anak_4', $jenis_kelamin_anak_4);
			}
			
			// blok yg sudah di isi
			if ($datakaryawan)
			{
				$status="not";
				if(isset($_POST['status']))
					$status="active";
				
				$local = new MongoClient();
				$db = $local->karyawan;
				
				$collection = $db->jabatan;
				$mcollection = $collection->findOne(array('_id' => new MongoId($_POST['jabatan'])));
				
				$dept = $db->departement;
				$mdept = $dept->findOne(array('_id' => new MongoId($_POST['departement'])));
				
				$ag = $db->agama;
				$sag = $ag->findOne(array('_id' => new MongoId($_POST['agama'])));
				
				$bul = $db->bulan;
				$mbul = $bul->findOne(array('_id' => new MongoId($_POST['bulan'])));
				
				$mstatpeg = $db->status_pegawai;
				$mstatpegm = $mstatpeg->findOne(array('_id' => new MongoId($_POST['status_pegawai'])));
				
				/*$bull = $db->bulan;
				$mbull = $bull->findOne(array('_id' => new MongoId($_POST['bulan_kerja'])));*/
				
				$bio = $db->biodata;
				
				$data = array (
					'no' => $no,
					'surat_kontrak' => $surat_kontrak,
					'no_npwp' => $no_npwp,
					'golongan_darah' => $gologan_darah,
					'pendidikan_terakhir' => $pendidikan_terakhir,
					'status_pegawai' => new MongoId($fw->set('POST.status_pegawai')),
					'tanggal' => $tanggal,
					'nama' => $nama,
					'alamat' => $alamat,
					'tlahir' => $tlahir,
					'kota' => $kota,
					'prov' => $prov,
					'kd_pos' => $kd_pos,
					'negara' => $negara,
					'birthday' => $birthday,
					'bulan' => new MongoId($fw->get('POST.bulan')),
					//'bulan' => $bulan,
					'agama' => new MongoId($fw->get('POST.agama')),
					'jenis_kelamin' => $jenis_kelamin,
					'jabatan' => $jabatan,
					'departement' => new MongoID($fw->get('POST.departement')),
					'gaji_pokok' => $gaji_pokok,
					'email' => $email,
					'norek' => $norek,
					'bank' => $bank,
					'cabang' => $cabang,
					'kawin' => $kawin,
					'telephone' => $telp,
					'work_in' => $work_in,
					//'bulan_kerja' => new MongoId($fw->get('POST.bulan_kerja')),
					'bulan_kerja' => $bulan_kerja,
					'tahun_kerja' => $tahun_kerja,
					'status' => $status,
					//data ortu
					'nm_ayah' => $nm_ayah,
					'nm_ibu' => $nm_ibu,
					'alamat_ortu' => $alamat_ortu,
					'work_ayah' => $work_ayah,
					'work_ibu' => $work_ibu,
					'education_ayah' => $education_ayah,
					'education_ibu' => $education_ibu,
					//data keluarga
					'nm_istri' => $nm_istri,
					'umur' => $umur,
					'pendidikan' => $pendidikan,
					'jobs' => $jobs,
					'jml_anak' => $jml_anak,
					//anak1
					'nm_anak_1' => $nm_anak_1,
					'umur_anak_1' => $umur_anak_1,
					'pendidikan_anak_1' => $pendidikan_anak_1,
					'jenis_kelamin_anak_1' => $jenis_kelamin_anak_1,
					//anak 2
					'nm_anak_2' => $nm_anak_2,
					'umur_anak_2' => $umur_anak_2,
					'pendidikan_anak_2' => $pendidikan_anak_2,
					'jenis_kelamin_anak_2' => $jenis_kelamin_anak_2,
					//anak 3
					'nm_anak_3' => $nm_anak_3,
					'umur_anak_3' => $umur_anak_3,
					'pendidikan_anak_3' => $pendidikan_anak_3,
					'jenis_kelamin_anak_3' => $jenis_kelamin_anak_3,
					//anak 4
					'nm_anak_4' => $nm_anak_4,
					'umur_anak_4' => $umur_anak_4,
					'pendidikan_anak_4' => $pendidikan_anak_4,
					'jenis_kelamin_anak_4' => $jenis_kelamin_anak_4,
					
					'foto' => $foto,
				);
				$newdata = array('$set' => $data);
				$bio->update(array("_id" => new MongoId($id)), $newdata);
				$fw->reroute("/biodata/detail");
			}
			
		}
		else
		{
			$fw->set('no', $mbio['no']);
			$fw->set('surat_kontrak', $mbio['surat_kontrak']);
			$fw->set('no_npwp', $mbio['no_npwp']);
			$fw->set('golongan_darah', $mbio['golongan_darah']);
			$fw->set('pendidikan_terakhir', $mbio['pendidikan_terakhir']);
			$fw->set('status_pegawai', $mbio['status_pegawai']);
			$fw->set('gaji_pokok', $mbio['gaji_pokok']);
			$fw->set('tanggal', $mbio['tanggal']);
			$fw->set('bulan_kerja', $mbio['bulan_kerja']);
			$fw->set('tahun_kerja', $mbio['tahun_kerja']);
			$fw->set('nama', $mbio['nama']);
			$fw->set('alamat', $mbio['alamat']);
			$fw->set('tlahir', $mbio['tlahir']);
			$fw->set('kota', $mbio['kota']);
			$fw->set('prov', $mbio['prov']);
			$fw->set('kd_pos', $mbio['kd_pos']);
			$fw->set('negara', $mbio['negara']);
			$fw->set('birthday', $mbio['birthday']);
			$fw->set('bulan', $mbio['bulan']);
			$fw->set('agama', $mbio['agama']);
			$fw->set('jenis_kelamin', $mbio['jenis_kelamin']);
			$fw->set('jabatan', $mbio['jabatan']);
			$fw->set('departement', $mbio['departement']);
			$fw->set('email', $mbio['email']);
			$fw->set('norek', $mbio['norek']);
			$fw->set('bank', $mbio['bank']);
			$fw->set('cabang', $mbio['cabang']);
			$fw->set('kawin', $mbio['kawin']);
			$fw->set('telp', $mbio['telephone']);
			$fw->set('work_in', $mbio['work_in']);
			$fw->set('foto', $mbio['foto']);

			if(isset($mbio['status']))
				$fw->set('status', $mbio['status']);
			else {
				$fw->set('status', '');
			}
			//data ortu
			$fw->set('nm_ayah', $mbio['nm_ayah']);
			$fw->set('nm_ibu', $mbio['nm_ibu']);
			$fw->set('alamat_ortu', $mbio['alamat_ortu']);
			$fw->set('work_ayah', $mbio['work_ayah']);
			$fw->set('work_ibu', $mbio['work_ibu']);
			$fw->set('education_ayah', $mbio['education_ayah']);
			$fw->set('education_ibu', $mbio['education_ibu']);
			//data keluarga
			$fw->set('nm_istri', $mbio['nm_istri']);
			$fw->set('umur', $mbio['umur']);
			$fw->set('pendidikan', $mbio['pendidikan']);
			$fw->set('jobs', $mbio['jobs']);
			$fw->set('jml_anak', $mbio['jml_anak']);
			
			$fw->set('nm_anak_1', $mbio['nm_anak_1']);
			$fw->set('nm_anak_2', $mbio['nm_anak_2']);
			$fw->set('nm_anak_3', $mbio['nm_anak_3']);
			$fw->set('nm_anak_4', $mbio['nm_anak_4']);
			$fw->set('umur_anak_1', $mbio['umur_anak_1']);
			$fw->set('umur_anak_2', $mbio['umur_anak_2']);
			$fw->set('umur_anak_3', $mbio['umur_anak_3']);
			$fw->set('umur_anak_4', $mbio['umur_anak_4']);
			$fw->set('pendidikan_anak_1', $mbio['pendidikan_anak_1']);
			$fw->set('pendidikan_anak_2', $mbio['pendidikan_anak_2']);
			$fw->set('pendidikan_anak_3', $mbio['pendidikan_anak_3']);
			$fw->set('pendidikan_anak_4', $mbio['pendidikan_anak_4']);
			$fw->set('jenis_kelamin_anak_1', $mbio['jenis_kelamin_anak_1']);
			$fw->set('jenis_kelamin_anak_2', $mbio['jenis_kelamin_anak_2']);
			$fw->set('jenis_kelamin_anak_3', $mbio['jenis_kelamin_anak_3']);
			$fw->set('jenis_kelamin_anak_4', $mbio['jenis_kelamin_anak_4']);
			
		}
		
		$fw->set("link", '/biodata/detail?id='.$id);
		
		$view = View::instance()->render("biodata/detail.php"); 
		echo $view;
	}
	
	public function delete()
	{
		$fw = Base::instance();
		
		$local = new MongoClient();
		$id = $fw->get('GET["id"]');
		$db = $local->karyawan;
		$bio = $db->biodata;

		$bio->remove(array('_id' => new MongoId($id)));
		$fw->reroute('/biodata/index');
	}
	
}
