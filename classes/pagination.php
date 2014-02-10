<?php

class Pagination
{
	private $arr = array();
	public $pag_url;
	
	public function __construct()
	{
	}
	public function Show()
	{
		$fw = Base::instance();
		
		$str = '';
		//$str .= '<div class="pagination pull-right">';						
		$str .= '<ul class="pagination">';
		$str .= '<li>Page '.$fw->arr['current'].' of '.$fw->arr['last'].'</li>';

		if(intval($fw->arr['current']) > 0)
		{
			if(1 != $fw->arr['current'])
				$str .= '<li class="first"><a href="'.$fw->pag_url.'1" >First</a> </li>'; 
			if($fw->arr['previous'] != $fw->arr['current'])
				$str .= '<li class="previous"><a href="'.$fw->pag_url.$fw->arr['previous'].'" >Prev</a> </li>';
			//echo '<li><a href="'.$pag_url.$pagination['previous'].'" class="button light_blue_btn"><span><span>&lt; Prev</span></span></a> </li>';
			foreach($fw->arr['pages'] as $rp)
			{
				if($fw->arr['current'] == $rp)
					$str .= '<li><a href="#" class="current"><span><span>'.$rp.'</a></li>'; 
				else
					$str .= '<li><a href="'.$fw->pag_url.$rp.'">'.$rp.'</a></li>'; 
			}
			if($fw->arr['next'] != $fw->arr['current'])
				$str .= '<li class="next"><a href="'.$fw->pag_url.$fw->arr['next'].'" >Next</a> </li>'; 
						
			if($fw->arr['last'] != $fw->arr['current'])
				$str .= '<li class="last"><a href="'.$fw->pag_url.$fw->arr['last'].'" >Last</a> </li>';
		}
		$str .= '</ul>';
		//$str .= '</div>';
		return $str;
	}
	public function calculate_pages($total_rows, $rows_per_page, $page_num)
	{
		$fw = Base::instance();
		// calculate last page
		$last_page = ceil($total_rows / $rows_per_page);
		// make sure we are within limits
		$page_num = (int) $page_num;
		if ($page_num < 1)
		{
		   $page_num = 1;
		} 
		elseif ($page_num > $last_page)
		{
		   $page_num = $last_page;
		}
		$upto = ($page_num - 1) * $rows_per_page;
		$fw->arr['limit'] = 'LIMIT '.$upto.',' .$rows_per_page;
		$fw->arr['current'] = $page_num;
		if ($page_num == 1)
			$fw->arr['previous'] = $page_num;
		else
			$fw->arr['previous'] = $page_num - 1;
		if ($page_num == $last_page)
			$fw->arr['next'] = $last_page;
		else
			$fw->arr['next'] = $page_num + 1;
		$fw->arr['last'] = $last_page;
		$fw->arr['info'] = 'Page ('.$page_num.' of '.$last_page.')';
		$fw->arr['pages'] = $fw->get_surrounding_pages($page_num, $last_page, $fw->arr['next']);
		return $fw->arr;
	}
	function get_surrounding_pages($page_num, $last_page, $next)
	{
		$fw = Base::instance();
		
		$arr = array();
		$show = 5; // how many boxes
		// at first
		if ($page_num == 1)
		{
			// case of 1 page only
			if ($next == $page_num) return array(1);
			for ($i = 0; $i < $show; $i++)
			{
				if ($i == $last_page) break;
				array_push($arr, $i + 1);
			}
			return $arr;
		}
		// at last
		if ($page_num == $last_page)
		{
			$start = $last_page - $show;
			if ($start < 1) $start = 0;
			for ($i = $start; $i < $last_page; $i++)
			{
				array_push($arr, $i + 1);
			}
			return $arr;
		}
		// at middle
		$start = $page_num - $show;
		if ($start < 1) $start = 0;
		for ($i = $start; $i < $page_num; $i++)
		{
			array_push($arr, $i + 1);
		}
		for ($i = ($page_num + 1); $i < ($page_num + $show); $i++)
		{
			if ($i == ($last_page + 1)) break;
			array_push($arr, $i);
		}
		return $arr;
	}
}
?>