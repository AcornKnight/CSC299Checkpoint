<?php
	// ASE 230 Great Quotes Project
	// Noah Gestiehr

	// reads the contents of a CSVfile in as an array
	function readContent($file) {
			$csvFile = fopen($file,"r") or die("File does not exist.");
			while(!feof($csvFile)) {
				$contentArray[] = fgetcsv($csvFile);
			}
			fclose($csvFile);
			return $contentArray;
	}

	// Returns the value at the given element of a CSVfile array.
	function readContentIndex($file, $index) {
			$csvFile = fopen($file,"r") or die("File does not exist.");
			while(!feof($file)) {
				$contentArray[] = fgetcsv($csvFile);
			}
			fclose($file);
			return $contentArray[$index];
	}


	// adds a new cell/element to the users given CSV file.
	function addContent($userFile, $author,$newContent) {
//			$newFile = fopen($userFile,"w+") or die("That CSV file does not exist.");
			//print_r($author);
			//print_r($newContent);
			file_put_contents($userFile,"\n$author,$newContent",FILE_APPEND);
//			fclose($newFile);
	}

	// Modifies a line in a CSVfile at the users provided index to their input.
	function modifyLine($userFile,$line, $change) {

			$contentArray=readContentHeader($userFile);
			$headers=getHeader($userFile);
			$contentArray[$line]['Quote']= $change;
			array_unshift($contentArray,$headers);
			print_r(quoteToString($contentArray));

			file_put_contents($userFile,quoteToString($contentArray));

	}

	// empties the given cell of a vsv file provided by the user
	function emptyContent($userFile,$line) {
			modifyLine($userFile, $line, '');
	}


	// Reads a quote and converts it into a string to be used by the readContentHeader function.
	// If the quote provided was not interpeted as an array, it does nothing but return the quote as is.
	function quoteToString($quote) {

		if (is_array($quote)){
			$result = [];
			foreach ($quote as $val) {
					if(is_array($val)) {
						if(array_key_exists("Author",$val) && array_key_exists("Quote",$val)) {
							$result[]= $val['Author'].','.$val['Quote']."\n";
						}
					}
					else {
						print('$val was not array');
						print_r($val);
					}
			}
			return $result;
		}
		else {
			//if(array_key_exists("Author",$quote) && array_key_exists("Quote",$quote)) {
			//	return $quote['Author'].','.$quote['Quote']."\n";
			//}
			//else {
				return null;
			//}
		}

	}


	// Deletes the contents of the row in a CSVfile provided by the user.
	function deleteContent($userFile,$line) {
			$modify = fopen($userFile,'r+') or die("That csv file does not exist.");


			$contentArray=readContentHeader($userFile);
			$headers=getHeader($userFile);
			array_unshift($contentArray,$headers);
			print_r($contentArray);

			array_splice($contentArray, $line+1, 1);

			file_put_contents($userFile,quoteToString($contentArray));
	}


	// Retrieves the header from a CSV file and saves it so that it is not counted when doing user input for modification or deletion.
	function getHeader($file){
		$csv = array_map('str_getcsv', file($file));
		//print_r($csv);
		if (count($csv) < 1) { return [];}
		$headers = $csv[0];
		foreach ($csv as $row) {
			$newRow = [];
			foreach ($headers as $k => $key) {
				$newRow[$key] = $row[$k];
			}
			return $newRow;
		}
	}


		// Retrieves the header from a CSV file and saves it so that it is not counted when doing user input for modification or deletion.
	function readContentHeader($file){
		//echo $file;
		$csv = array_map('str_getcsv', file($file));
		//print_r($csv);
		if (count($csv) < 1) { return [];}
		$headers = $csv[0];
		unset($csv[0]);
		$rowsWithKeys = [];
		foreach ($csv as $row) {
			$newRow = [];
			foreach ($headers as $k => $key) {
				$newRow[$key] = $row[$k];
			}
			$rowsWithKeys[] = $newRow;
		}

		return $rowsWithKeys;
	}
	// Function Calls
	//writeMsg(); // call the function

?>
