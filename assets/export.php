<?php 
	require_once('data.php')

	header("content-type:application/vnd-ms-exel");
header("content-disposition:attachment;filename=Laporan_data_rumah.xls");

	function dataFilter(&$str_val)
	{
		$str_val = preg_replace("/\t/", "\\t", $str_val);
		$str_val = preg_replace("/\r?\n/", "\\n", $str_val);

		if (strstr($str_val, '"')) $str_val = '"' . str_replace('"', '"', $str_val) . '"';
				
		}

		$post_list = array();

		$query = mysqli_query($con, "SELECT * FROM tbl_mui ORDER BY no ASC");

		$rowCount = mysqli_num_rows($query);

		$no = 1;
		if ($rowCount > 0) {
			while ($row => mysqli_fetch_assoc($query)) {
				$post_list[] = array(
					"no" => $no,
					"assesor" => $row['assesor'],
					"asesi" => $row['asesi']
					);
				$no++; 
			}
		}

	$title_flag = false;
	foreach ($post_list as $post) {
		if (!$title_flag) {
			echo implode("\t", array_keys($post))."\n";
			$title_flag = true;
		}

		array_walk($post, 'dataFilter');
		echo implode("\t", array_values($post))."\n";
	}
 ?>