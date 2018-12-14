<?php

$n=$_GET['Name'];
$e=$_GET['Email'];
$t=$_GET['Text'];
// $c = rawurldecode($t);

// echo "$n<br>";
// echo "$e<br>";
// echo "$t<br>";


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
    .table{


        font-size: 15px;
	}
    textarea {
        white-space: nowrap; /* 禁止換行 */
        overflow: hidden; /* 不顯示捲軸 */
        resize:none; /* 禁止瀏覽器拖放區塊大小 */
    }
    .form-control {
    	width: 80%;
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
	<h1>修改</h1>
	<div class="edit_content">
        <form action="" method="post" name="form2">
        <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>姓名</th>
                <th>Email</th>
                <th>留言</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        	<td>

        	</td>
	        	<td>
	        		<input type="text" name="Name" value="<?php echo $n?>" class="form-control">

	        	</td>
	        	<td>
	        		<input type="text" name="Email" value="<?php echo $e?>" class="form-control">
	        	</td>
	        	<td>
	        		<input type="text" name="Textcontent" value="<?php echo $t?>" class="form-control">
	        	</td>
        </tr>
        </tbody>
		</table>
			<button type="submit" class="btn btn-lg" onclick="update('<? echo $n?>','<? echo $e?>','<? echo $t?>')">確認</button>
        </form><br>
			<button type="" class="btn btn-lg" onclick="location.href='index.php'">回上頁</button>
	</div>



</body>
<script>
	function update(n, e,t){
		form2.action="change.php?Name=" + n + "&Email=" + e + "&Textcontent=" + t;

	}

</script>
</html>
