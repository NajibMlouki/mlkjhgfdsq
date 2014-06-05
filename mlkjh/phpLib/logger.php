<?php
class logTracing 
{
		
	function __construct($output)
	{
		
		$this->traceLog($output);
		
	}
	
	//-------------------------------------------
	
	function traceLog($output){
		
		$fileName='C:/wamp/www/DocTunisie2/phpLib/trace.log';
		
		$dateLog= date("d-M-Y , H:i:s", mktime( date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")));
		
		$outputLog = $dateLog.' | ';
		$outputLog.= $output;
		$outputLog.= " \n \n ";
		
		file_put_contents($fileName, $outputLog, FILE_APPEND | LOCK_EX);
	}
	
	//-------------------------------------------
	
	function traceLogFile($fileName,$output){
		$dateLog= date("d-M-Y , H:i:s", mktime( date("H")+1, date("i"), date("s"), date("m"), date("d"), date("Y")));
		
		$outputLog = $dateLog.' | ';
		$outputLog.= $output;
		$outputLog.= " \n \n ";
		
		file_put_contents($fileName, $outputLog, FILE_APPEND | LOCK_EX);
	}
	
	
	}
?>