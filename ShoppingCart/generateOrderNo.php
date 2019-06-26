<?php
	class generateOrderNo {
		// Check connection
		function getOrderNo(){
			return md5(uniqid(rand(), true));
		}

	}
?>
