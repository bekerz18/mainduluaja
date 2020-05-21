<?php

class BackendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('../home');
		$this->load->model('kriteria_m');
		$this->load->model('alternatif_m');
		$this->load->model('nilai_m');
		$this->load->model('hasil_rank_m');
		$this->load->model('Mymod');
		$this->load->library('Ahp');
		$this->load->library('Topsis');
	}

	public function index()
	{
		if($this->session->userdata('level') != 0 ) redirect('../home');
		$y['title']='Dashboard';

		$this->data['kriteria']     = $this->kriteria_m->get_by_order('kriteria_kode','asc');
		$this->data['hasil_rank']     = $this->hasil_rank_m->get_by_order('hr_value','desc');
		$this->data['alternatif']     = $this->alternatif_m->get_by_order('alternatif_kode','asc');
		$this->data['nilai']     = $this->nilai_m->getDataJoin(['parameter'],['nilai.parameter_id = parameter.parameter_id']);

		$this->data['bobot'] = array(
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '5',
			7 => '7',
			8 => '8',
			9 => '9',
		);


		if(isset($_POST['save_perbandingan'])){
			$jumlah_kriteria = 7;
			$array1 = array();
			$k = 0;
			$l = 0;
			for($i=0;$i<$jumlah_kriteria;$i++)
			{
				for($j=$k;$j<$jumlah_kriteria;$j++)
				{
					if($i==$j)
					{
						$array1[$i][$j] = 1;
					}
					else
					{
						$array1[$i][$j] = $this->input->post('bobot'.$l);
						$array1[$j][$i] = round(1/$array1[$i][$j],3);
						$l++;				
					}
				}
				$k++;
			}


			$this->data['ksd'] = $array1;
			$this->data['row_total'] = $this->ahp->get_row_total($array1);
			$this->data['normal'] = $this->ahp->normalize($array1, $this->data['row_total']);
			$this->data['priority'] = $this->ahp->get_priority($this->data['normal']);
			$this->data['sumnor'] = $this->ahp->get_jumlah_normalisasi($this->data['normal']);
			$this->data['cm'] = $this->ahp->get_cm($array1, $this->data['priority']);
			$this->data['consistency'] = $this->ahp->get_consistency($this->data['cm']);


			$this->data['baseKriteria'] = $this->topsis->baseKriteria($this->data['kriteria']);
			$this->data['baseAlternatif'] = $this->topsis->baseAlternatif($this->data['alternatif']);
			$this->data['baseALterKD'] = $this->topsis->baseALterKD($this->data['alternatif']);
			$this->data['nilaiAlkrit'] = $this->topsis->nilaiAlkrit($this->data['alternatif'],$this->data['kriteria'],$this->data['nilai']);
			$this->data['pembagi'] = $this->topsis->pembagi($this->data['baseAlternatif'],$this->data['baseKriteria'],$this->data['nilaiAlkrit']);
			$this->data['normalisasi'] = $this->topsis->normalisasi($this->data['baseAlternatif'],$this->data['baseKriteria'],$this->data['nilaiAlkrit'],$this->data['pembagi']);
			$this->data['terbobot'] = $this->topsis->terbobot($this->data['baseAlternatif'],$this->data['baseKriteria'],$this->data['normalisasi'],$this->data['priority']);
			$this->data['aplus'] = $this->topsis->aplus($this->data['baseKriteria'],$this->data['baseAlternatif'],$this->data['terbobot']);
			$this->data['amin'] = $this->topsis->amin($this->data['baseKriteria'],$this->data['baseAlternatif'],$this->data['terbobot']);
			$this->data['dplus'] = $this->topsis->dplus($this->data['baseAlternatif'],$this->data['baseKriteria'],$this->data['terbobot'],$this->data['aplus']);
			$this->data['dmin'] = $this->topsis->dmin($this->data['baseAlternatif'],$this->data['baseKriteria'],$this->data['terbobot'],$this->data['amin']);
			$this->data['hasil'] = $this->topsis->hasil($this->data['dmin'],$this->data['dplus'],$this->data['baseALterKD']);


			for($i=0;$i<count(($this->data['hasil']['alterKD']));$i++){
				$cek = $this->hasil_rank_m->get()[$i];
				if (!isset($cek)) {
					$insertAk = $this->hasil_rank_m->insert(['alternatif_kode' => $this->data['hasil']['alterKD'][$i]]);
				} else {
					$updateAk = $this->hasil_rank_m->update($cek->hr_id,['alternatif_kode' => $this->data['hasil']['alterKD'][$i]]);
				}
			}

			$arrs = [];
			for($j=0;$j<count(($this->data['hasil']['hasil']));$j++){
				$cek = $this->hasil_rank_m->get()[$j];
				$arrs[] = [
					'id' => $cek->hr_id,
					'alter' => $cek->alternatif_kode,
					'vals' => $this->data['hasil']['hasil'][$j],
				];
			}

			foreach ($arrs as $key => $value) {
				$updateAk = $this->hasil_rank_m->update($value['id'],['hr_value' => $value['vals']]);
			}

		}

		if($_SESSION['user_role'] == 'supervisor') :
			$this->data['hasil_report']     = $this->db->query("SELECT * from hasil_rank INNER JOIN alternatif on hasil_rank.alternatif_kode=alternatif.alternatif_kode order by hasil_rank.hr_value desc")->result();
		endif;
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index',$this->data);
		$this->load->view('backend/layout/footer');
	}
	public function rank($type=null){
		if($this->session->userdata('level')== 0){
			$model = $this->Mymod;
			if($type == 1){
				echo json_encode($model->get_rank());
			}elseif ($type == 2) {
				if(!$model->get_rank_last()){
					echo json_encode($model->get_rank());
				}else{
					echo json_encode($model->get_rank_last());
				}
			}
			elseif ($type == 3) {
				echo json_encode($model->get_rank_all());
			}elseif ($type == 10) {
				echo json_encode($model->get_rank_10());
			}
			
		}else{
			redirect('../home');
		}
	}
	
    public function bala(){
		$model = $this->Mymod;
		$users = $model->get_all();

		foreach ($users as $user) {
			$update = $model->update_id($user->alternatif_kode);
			if($update){
				echo 'berhasi '.$user->alternatif_kode.'<br>';
			}else{
				echo 'gagal '.$user->alternatif_kode.'<br>';
			}
		}
	}
	public function cetak()
	{
		$data['title'] = 'Daftar Pembimbing Manajemen';
		$data['dosens'] = $this->Mymod->get_rank_all();
		$url = str_replace("manajemen/", "", base_url());
		$data['url'] = $url;
		$css = $url."assets/dist/css/cetak.css";
		$style = file_get_contents($css);
		$cetak = $this->load->view('cetak',$data,TRUE);
        $users= new \Mpdf\Mpdf(['format' => 'Legal']);
        $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
        $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
        $users->Output($data['title'].'.pdf', 'D');
		
	}

}