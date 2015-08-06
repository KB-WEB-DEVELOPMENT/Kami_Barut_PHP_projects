<?php

	class Log	{
		
	private $_Filename;
	private $_Data;

	/**
	*	@desc	Writes to file
	*   @param  str $strFileName The name of the file
	*   @param  str $strData Data to be appended to the file
	*/
	public function Write($strFileName, $strData)		{
		
		// Set Class Vars
		$this->_Filename = $strFileName;
		$this->_Data = $strData;
		
		// Check Data
		$this->_CheckPermission();
		$this->_CheckData();
		
		//write to file
		$handle = fopen($strFileName, 'a+');
				
		fwrite($handle, "\r" . $strData);

		fclose($handle);
	}

	/**
	*	@desc	Reading a file
	*   @param  str $strFileName The name of the file
	*   @return  str the text file 
	*/
	
	public function Read($strFileName)		{
		
		$this->_Filename = $strFileName;
		$this->_CheckExists();
		
		
		$handle = fopen($strFileName, 'r');
		return file_get_contents($strFileName);

	}
	
	private function _CheckPermission()	{

			if (!is_writable($this->_FileName))
			die('Change your CHMOD permissions to  ' . $this->_FileName);
	}

	
	/**
	*	
	*   @desc  checks if the file being called exists
	*   
	*/
	private function _CheckExists()	{

			if (!file_exists($this->_Filename))
			die('The file does not exist');

	}
	
	public function _CheckData()	{

			if (strlen($this->_Data) < 1)
			die('change your CHMOF permissions to ' . $this->_Filename);
	}
}


?>
