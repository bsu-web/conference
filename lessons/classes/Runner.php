<?php
	require_once("Configure.php");
	
	class Runner{
		static function init($file){
			try{
				$conf=new Configure($file);	
			}
			catch(FileException $e){
				echo $e->message();
			}
			catch(DamagedException $e){
				echo $e->message();
			}
			catch(WrongException $e){
				echo $e->message();
			}
			catch (Exception $e){
				echo "Меня быть не должно!";
			}
		}
	}
?>