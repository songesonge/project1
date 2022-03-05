<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  (나야나~~~~~)
		$page=2
	*/
	
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="css/write_form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="../common/js/prefixfree.min.js"></script>
    


    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

</head>
<body>
  

<div class="wrap">
   <!-- 서브 헤더영역 -->
   <? include "../common/sub_header.html" ?>

    <div class="visual">
        <img src="../sub6/common/images/visual.jpg" alt="">
        <h3>COMMUNITY</h3>
        <span>Newsletter</span>
    </div>

    <div class="sub_menu">
         <ul>
            <li><a href="../sub6/sub6_1.html">Event</a></li>
            <li><a href="../sub6/sub6_2.html">FAQ</a></li>
            <li><a href="../sub6/sub6_3.html">Contact</a></li>
            <li class="current"><a href="./list.php">Newsletter</a></li>
        </ul>
    </div>

    <article id="content">
        <div class="top_bg">
            <div class="title_area">
                <div class="line_map"><i class="fas fa-home"></i> &gt; COMMUNITY &gt; <strong>NEWSLETTER</strong></div>
                <h2>Newsletter</h2>
                <p>마포아트센터의 새로운 소식들을 전합니다</p>                
            </div>
        </div>

        <div class="content_area">
        
            <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
            <div id="write_form">
                <div class="write_line"></div>
                <div id="write_row1">
                    <div class="col1"> 닉네임 </div>
                    <div class="col2"><?=$usernick?></div>
                </div>
                <div class="write_line"></div>
                <div id="write_row2"><div class="col1"> 제목   </div>
                                    <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
                </div>
                <div class="write_line"></div>
                <div id="write_row3"><div class="col1"> 내용   </div>
                                    <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
                </div>
                <div class="write_line"></div>
            </div>

            <div id="write_button">
                <label for="m_submit" class="hidden">수정버튼</label>
                <input type="submit" value="수정">&nbsp;
                <a href="list.php?page=<?=$page?>">목록</a>
            </div>
            </form>

        </div>
    </article>

    <!-- 서브 푸터영역 -->
    <? include "../common/sub_footer.html" ?>
  </div>

  <!-- JQuery -->
  <script src="../common/js/jquery-1.12.4.min.js"></script>
  <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
  <script src="../common/js/subnav.js"></script>


</body>
</html>