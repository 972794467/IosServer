<?php
   class ConnectDatabase{
	   private $dbLink;
	    function __construct($dbnameType) {
          $this->dbLink=new mysqli(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,$dbnameType);
            if(mysqli_connect_errno()){
	           exit(CONNECT_DATABASE_ERROR_CODE);
              }
            else{
	           $this->dbLink->query("set names utf8");
            }
       }
	   
	    function __destruct(){
			$this->dbLink->close();		
		}
	   public function query($sql){                       //���ڵ��ô洢���̺��޷���ֵ�����ݿ����
	      $result=$this->dbLink->query($sql);
			//var_dump($result);
		  if($result!=false){
			  //$result->free();
			  return 1;			  
		  }
		   else{
			  //echo $result;
			  return 0;
		  }
        }
		
		public function querySingle($sql){             //���ڷ��ص������ݵĲ���
			$result=$this->dbLink->query($sql);
			if($result==null){				
				return 0;
			}			
			$row=$result->fetch_assoc();
			$result->free();
			return $row;					
		}
		
		public function queryMultiple($sql){              //���ڷ��ض������ݵĲ���
			$result=$this->dbLink->query($sql);
			$rows=array();
			if(!$result->num_rows){
				return 0;
			}	
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
			$result->free();
			return $rows;
			
		}
		
		public function get_insert_id(){
			return mysqli_insert_id($this->dbLink);			
		}
	   
   
   }
   