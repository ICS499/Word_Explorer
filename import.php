<?php 
	header( 'Content-Type: text/html; charset=utf-8' );
	require('InsertUtil.php');
	require('DeleteUtil.php');
	include './PHPExcel/PHPExcel/IOFactory.php';

	$discrepancies = new ArrayObject();
	
	$error = false;
	$result = "";

	if(isset($_POST['submit'])){

		//function to delete all data except for users table from the db. 
		deleteAllData();
				
		$inputFileName = $_FILES["fileToUpload"]["tmp_name"];
		
		try {
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
			. '": ' . $e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
  		
		for ($row = 2; $row <= $highestRow; $row++) {
			//  Read the row of data into an array
            $topic = $sheet->getCell('B' . $row )->getValue();
            $length = $sheet->getCell('C' . $row )->getValue();
            $level = $sheet->getCell('D' . $row )->getValue();
            $telugu_word = $sheet->getCell('E' . $row )->getValue();
			$english_word = $sheet->getCell('F'.$row)->getValue();
            $telugu_in_english = $sheet->getCell('G'.$row)->getValue();
            $english_in_telugu = $sheet->getCell('H' . $row )->getValue();
            $image_name = $sheet->getCell('I' . $row )->getValue();
            $audio_name = $sheet->getCell('J' . $row )->getValue();
            $description = $sheet->getCell('K' . $row )->getValue();
            $notes = $sheet->getCell('L' . $row )->getValue();

			// to remove invalid character eg: \u00a0
            $topic = validate_input($topic);
            $length = validate_input($length);
            $level = validate_input($level);
            $telugu_word = validate_word($telugu_word);
            $english_word  = validate_word($english_word);
            $telugu_in_english = validate_word($telugu_in_english);
            $english_in_telugu = validate_word($english_in_telugu);
            $image_name = validate_input($image_name);
            $audio_name = validate_input($audio_name);
            $description = validate_input($description);
            $notes = validate_input($notes);

			// Length checker/fixer
			$calculatedLength = count(getWordChars($telugu_word));
			if ($calculatedLength != $length){
				array($discrepancies, $telugu_word);
				$length = $calculatedLength;
			}

			// Insert new data into Words & Characters Table
			insertIntoWordsTable($topic, $length, $level, $telugu_word, $english_word, $telugu_in_english, $english_in_telugu,
				$image_name, $audio_name, $description, $notes);
			//insertIntoCharactersTable($topic);

		}
		echo '<h2 style="color:	green;" class="upload">Import Successful!</h2>';
	}
?>
