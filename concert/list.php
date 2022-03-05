<? 
	session_start(); 
	$table = "concert";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENT</title>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="../common/js/prefixfree.min.js"></script>
    


    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

<?
    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if (!$scale){
       $scale=10; 			// 한 화면에 표시되는 글 수
	}

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
</head>
<body>
  

<div class="wrap">
   <!-- 서브 헤더영역 -->
   <? include "../common/sub_header.html" ?>

   <div class="visual">
        <img src="../sub6/common/images/visual.jpg" alt="">
        <h3>COMMUNITY</h3>
        <span>EVENT</span>
    </div>

    <div class="sub_menu">
        <ul>
            <li  class="current"><a href="list.php">Event</a></li>
            <li><a href="../sub6/sub6_2.html">FAQ</a></li>
            <li><a href="../sub6/sub6_3.html">Contact</a></li>
            <li><a href="../greet/list.php">Newsletter</a></li>
         </ul>
    </div>

    <article id="content">
        <div class="top_bg">
            <div class="title_area">
                <div class="line_map"><i class="fas fa-home"></i> &gt; COMMUNITY &gt; <strong>NEWSLETTER</strong></div>
                <h2>Event</h2>
                <p>마포아트센터의 다양한 이벤트</p>
                <span>함께하면 더 즐거운 마포아트센터의 다양한 이벤트에 참여해 보세요!</span>               
            </div>
        </div>
        
        <div class="content_area">
                <div class="list_top">
                    <div id="list_total">Total: <b><?= $total_record ?></b> 건</div>
                        <select class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
                                    <option value=''>보기</option>
                                    <option value='5'>5</option>
                                    <option value='10'>10</option>
                                    <option value='15'>15</option>
                                    <option value='20'>20</option>
                        </select>
                    
                </div>
            <div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if(!$row[file_copied_0]){
        $thum_img = './data/default.jpg'; 
	  }else{
	  	$thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
	  	$thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
	  }
?>
			<div class="list_item">
				<div class="list_item2">
				   <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				       <img src="<?=$thum_img?>" alt="이">
				  </a>
				</div>
                <div class="list_item3">
				<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                    <?= $item_subject ?>
                </a>
                </div>
				<div class="list_info">
                    <div class="list_item1">No. <?= $number ?></div>
                    <div class="list_item4"><i class="fas fa-user"></i><?= $item_nick ?></div>
                    <div class="list_item5"><i class="far fa-calendar-alt"></i><?= $item_date ?></div>
                    <div class="list_item6"><i class="far fa-eye"></i><?= $item_hit ?></div>
                </div>
			</div>
<?
   	   $number--;
   }
?>
            <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
                <div class="list_search">
                    <div class="list_search1">
                        <select name="find">
                            <option value='subject'>제목</option>
                            <option value='content'>내용</option>
                            <option value='nick'>별명</option>
                            <option value='name'>이름</option>
                        </select>
                    </div>
                    <div class="list_search2">
                        <label for="search" class="hidden">검색</label>
                        <input type="text" id="search" name="search">
                    </div>
                    <div class="list_search3">
                        <label for="search_button" class="hidden">검색버튼</label>
                        <input type="submit" id="search_button" value="검색">
                    </div>
                </div>
            </form>

			<div class="page_button">
				<div class="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div class="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->

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