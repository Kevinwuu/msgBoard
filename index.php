<?php
mysql_connect("localhost","kevin","kevinxd"); //連結伺服器,登入
mysql_select_db("text_board");//選擇資料庫
mysql_query("set names utf8");//以utf-8讀取資料,讓資料可以讀取中文
$data = mysql_query("select * from result");//選擇從result資料表中讀取所有的資料
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TextBoard</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/icon/favicon.ico" />
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/animate.css">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <style>
    h1,
    h2,
    p {
        font-family: 微軟正黑體;
        text-align: center;
    }
    .InputAreq{
    	margin-top: 20px;


    }
    .OutputArea{
    	margin-left: 200px;
    	margin-right: 200px;
        margin-bottom: 100px;
    }

    #input_form {
    	margin-top: 20px;
    	margin-bottom: 50px;
        margin-left: 400px;
        margin-right: 400px;
        padding-left: 50px;
        padding-right: 50px;
    	padding-top: 30px;
    	padding-bottom: 30px;
		text-align: center;
		font-size: 18px;
        border:#CCEDF3 2px solid;
        background-color: #B2CFE4;
        border-radius: 10px;
    }
    textarea {
        white-space: nowrap; /* 禁止換行 */
        overflow: hidden; /* 不顯示捲軸 */
        resize:none; /* 禁止瀏覽器拖放區塊大小 */
    }
    form
    table{
        border:#B3B3B3 2px solid;
    }
    </style>
</head>

<body>
    <h1>留言板</h1>
    <div class="InputArea">
	    <form action="" method="post" name="form_area" id="input_form">
		  <div class="form-group">
			    <label for="exampleInputEmail1">姓名</label>
			    <input name="Name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
			    <small class="form-text text-muted">綽號也可以喔~</small>
		  </div>
		  	<div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input name="Email" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
			    <small class="form-text text-muted">請輸入有效的email</small>
		  </div>
		  	<div class="form-group">
			    <label for="exampleInputEmail1">留言</label>
				<textarea name="Textcontent" Wrap="Physical" id="" cols="15" rows="6" class="form-control" onkeydown="if(event.keyCode == 13) return false;"></textarea>
			    <small  class="form-text text-muted">50字以內</small>
		  </div>
	        <input type="submit" value="送出" class="btn-primary" onclick="form_area.action='ins_data.php'">
	        <br>
	    </form>
    </div>
    <hr><br><br><br>
    <div>
        <div class="OutputArea">
            <h1 class="wow fadeInDown">留言紀錄</h1><br>
            <table class="table table-striped table-hover wow fadeIn">
            <thead>
                <tr>
                    <th>#</th>
                    <th>姓名</th>
                    <th>Email</th>
                    <th>留言</th>
                    <th>修改</th>
                    <th>刪除</th>
                </tr>
            </thead>
                <tbody>
             <?php
    for($i=1;$i<=mysql_num_rows($data);$i++){
   		$rs=mysql_fetch_row($data);
    // $t = nl2br($rs[2]);
    ?>
                    <tr>
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td>
                            <?php echo $rs[0]?>
                        </td>
                        <td>
                            <?php echo $rs[1]?>
                        </td>
                        <td>
                            <?php echo $rs[2]?>
                        </td>
                        <td>
                            <button type="" class="btn btn-info" onclick="edit('<? echo $rs[0]; ?>','<? echo $rs[1]; ?>','<? echo $rs[2]; ?>')">修改</button>
                        </td>
                        <td>
                             <button type="" class="btn btn-danger" onclick="del('<? echo $rs[0]; ?>','<? echo $rs[1]; ?>','<? echo $rs[2] ?>')">刪除</button>
                        </td>
                    </tr>
                <?php
    }
    ?>
                </tbody>
        </table>

        <form  name="s_form" action="" method="post" id="search_form">
            <input type="submit" value="查詢" onclick="s_form.action='search_data.php'"></input>
            <input type="text" name="Key">(輸入關鍵字查詢)
        </form>
        </div>

    </div>

</body>

<script>

function del(name, email, content) {

var content1 = encodeURIComponent(content);
	// alert(name);
	// alert(email);
	// alert(content);
	// alert(content1);

	if(confirm("確定刪除" + name + "這筆資料?")){
		// alert("刪除");
		location.href = "del_data.php?Name=" + name + "&Email=" + email + "&Text=" + content;
	}
}


function edit(name, email, content){
    location.href= "edit_data.php?Name=" + name + "&Email=" + email + "&Text=" + content;
}
</script>
</html>
