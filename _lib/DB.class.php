<?php class DB
{
	public static function conn()
	{
		mysql_connect(DBSERVER,USERNAME,PASSWORD,DBNAME);
	}
}
?>