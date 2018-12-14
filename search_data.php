<?php

$key =$_POST[Key];


$sql_search = "SELECT * FROM result WHERE name='$key' OR email='$key' OR textarea='$key'";



mysql_connect("localhost","kevin","kevinxd"); //連結伺服器,登入
mysql_select_db("text_board");//選擇資料庫
mysql_query("set names utf8");//以utf-8讀取資料,讓資料可以讀取中文
$data = mysql_query($sql_search);//選擇從result資料表中讀取所有的資料

 ?>




 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/icon/book.png" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
   	h1,
    h2,
    p {
        font-family: 微軟正黑體;
        text-align: center;
    }
    .table th{
    	text-align: center;
	}


    .edit_content{
    	font-size: 15px;
    	margin-left: 200px;
    	margin-right: 200px;
    	text-align: center;
    }
    </style>
</head>
<body>
	<h1>搜尋結果</h1>
	<div class="edit_content">
        <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>姓名</th>
                <th>Email</th>
                <th>留言</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	while($row = mysql_fetch_row($data)){
        		?>
        <tr>
	        	<td>
	        		<?php echo $row[0]; ?>
	        	</td>
	        	<td>
	        		<?php echo $row[1]; ?>
	        	</td>
	        	<td>
	        		<?php echo $row[2]; ?>
	        	</td>
        </tr>
        <?php
}
?>
        </tbody>
		</table><br>
			<button type="" class="btn btn-lg" onclick="location.href='index.php'">回上頁</button>
	</div>
</body>
</html>
