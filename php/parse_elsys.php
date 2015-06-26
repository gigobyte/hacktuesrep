<?php
	function get_news() {
		$msg_arr = array();
		$single_msg = array();
		$skip_flag = 0;

		$src = file_get_contents("http://www.elsys-bg.org/");
		$msgs = explode('Съобщения<span class="h2arr">&raquo;</span></a></h2>', $src)[1];
		$msgs = explode('</ul>', $msgs)[0];
		
		foreach(explode('a href="', $msgs) as $msg) {
			$skip_flag++;
			if($skip_flag == 1) continue;
		
			$link = explode('"', $msg)[0];
			$title = explode('title="', $msg)[1];
			$title = explode('"', $title)[0];
			array_push($single_msg, $link);
			array_push($single_msg, $title);
			array_push($msg_arr, $single_msg);
			$single_msg = array();
		}
		
		return $msg_arr;
	}

	function show_message($msg, $link) {
		echo '<a href="'. $link . '" class="list-group-item">
				<i class="fa fa-comment fa-fw"></i> ' . $msg . '</br>
			</a>';
	}
?>