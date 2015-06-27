<?php
	if(isset($_POST['submit'])) {
		$number_of_questions = $_POST['number_of_questions'];
		
		require('tfpdf.php');

		$pdf = new tFPDF();
		$pdf->AddPage();

		// Add a Unicode font (uses UTF-8)
		$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
		$pdf->SetFont('DejaVu','',14);

		for ($i = 1; $i <= $number_of_questions; $i++) {
			$question = $_POST[$i];
			$pdf->SetFont("DejaVu","", "12");
			$pdf->write(5, $i);
			$pdf->write(5, ". ");
			$pdf->write(5, $question);
			$pdf->write(5, "\n\n");
			$answer = $i . "_1";
			$answer_option = $_POST[$answer];
			$pdf->SetFont("DejaVu","", "10");
			$pdf->write(5, "а) ");
			$pdf->SetFont("DejaVu", "", "8");
			$pdf->write(5, $answer_option);
			$pdf->write(5, "\n");
			$answer = $i . "_2";
			$answer_option = $_POST[$answer];
			$pdf->SetFont("DejaVu","", "10");
			$pdf->write(5, "б) ");
			$pdf->SetFont("DejaVu", "", "8");
			$pdf->write(5, $answer_option);
			$pdf->write(5, "\n");
			$answer = $i . "_3";
			$answer_option = $_POST[$answer];
			$pdf->SetFont("DejaVu","", "10");
			$pdf->write(5, "в) ");
			$pdf->SetFont("DejaVu", "", "8");
			$pdf->write(5, $answer_option);
			$pdf->write(5, "\n");		
			$answer = $i . "_4";
			$answer_option = $_POST[$answer];
			$pdf->SetFont("DejaVu","", "10");
			$pdf->write(5, "г) ");
			$pdf->SetFont("DejaVu", "", "8");
			$pdf->write(5, $answer_option);
			$pdf->write(5, "\n\n\n");
		}

		ob_clean();
		$pdf->Output();
	} else if(isset($_POST['publish'])) {
	}
?>