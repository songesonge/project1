<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보수정</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="./css/member_form.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <script>
	 $(document).ready(function() {		 
//nick 중복검사		 
$("#nick").keyup(function() {    
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
  });	
});	
	</script>
    <script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>

<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
</head>
<body>
    <header>
        <h1 class="logo"><a href="../index.html">MAC</a></h1>
    </header>
    <article id="content">
    <form  name="member_form" method="post" action="modify.php">
        <h2>회원정보 수정</h2>
        <span class="info"><i class="fas fa-check"></i> 항목은 필수 입력 사항입니다.</span> 
		<table>
      <caption class="hidden">회원정보 수정</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td>
			     
                         <?= $row[id] ?>			     
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label><i class="fas fa-check"></i></th>
     		<td>
     			 <input type="password" name="pass" id="pass" value="" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label><i class="fas fa-check"></i></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm"   value="" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<?= $row[name] ?> 
     		</td>
     	</tr>
     	<tr >
     		<th scope="col"><label for="nick">닉네임</label><i class="fas fa-check"></i></th>
     		<td>
     			 <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>" required>
			     <div id="loadtext2"></div>
     		</td>
     	</tr>       
     	<tr class="hp">
     		<th scope="col">휴대폰<i class="fas fa-check"></i></th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1" value="010"> 
                    <option value='010'>010</option>
                    <option value='011'>011</option>
                    <option value='016'>016</option>
                    <option value='017'>017</option>
                    <option value='018'>018</option>
                    <option value='019'>019</option>
                </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label>
          <input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>" required> - 
          <label class="hidden" for="hp3">전화번호끝4자리</label>
          <input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>" required>     			
     		</td>
     	</tr>
     	<tr class="mail">
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1" value="<?= $email1 ?>" > @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2" value="<?= $email2 ?>" >
     		</td>
     	</tr>
     	<tr class="mem_btn">
     		<td colspan="2">
     			<a href="#"  onclick="check_input()" class="fin">수정완료</a>&nbsp;&nbsp;
				 <a href="#"  onclick="reset_form()" class="re"> 다시쓰기</a>
     		</td>
     	</tr>
     </table>
	    </form>
    </article>
</body>
</html>