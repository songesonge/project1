<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
	<link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<div id="content">
        <form  name="member_form" method="post" action="login.php"> 
            <h1><a href="../index.html" class="logo2">mac 로고</a></h1>
            
            <div class="login_join">
                <div class="login">
                    <div id="id_pw_input">
                        <ul>
                            <li>
                                <label class="hidden" for="id">아이디</label>
                                <i class="fas fa-user"></i>
                                <input type="text" name="id" id="id" class="login_input" placeholder="아이디를 입력해주세요">
                            </li>
                            <li>
                                <label class="hidden" for="pass">비밀번호</label>   
                                <i class="fas fa-lock" aria-hidden="true"></i>
                                <input type="password" name="pass" id="pass" class="pass_input" placeholder="비밀번호를 입력해주세요">
                            </li>
                        </ul>						
                    </div>
                    
                    <div id="login_button">
                        <button type="submit">로그인</button>
                    </div>
                </div>

                <ul class="find_btn">
                    <li>
                        <span><a href="id_find.php">아이디 찾기</a></span>
                        <span><a href="pw_find.php">비밀번호 찾기</a></span>
                    </li>
	            </ul>
                
                <div id="join_button">
                        <span>아직 회원이 아니신가요?</span>
                    <a href="../member/member_check.html">회원가입</a>
                </div>

                
            </div>
        </form>
    </div>
</body>
</html>