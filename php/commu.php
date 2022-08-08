<?php 
    include "../php/header_t.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/commu.css">
    <script src="../js/move_box.js"></script>
    <title>commu</title>
</head>
<body>
    <div class="container">
<?php
	include "../php/board/session.php"; 	// 세션 처리

	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

		$con = mysqli_connect("localhost", "w1004mesmg", "sunmoons1s2s3!", "w1004mesmg");		// DB 연결
	$sql = "select * from memberboard order by num desc";	// 일련번호 내림차순 검색
	$result = mysqli_query($con, $sql);			// SQL 명령 실행

	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 4;	// 한 화면에 표시되는 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = (intval($page) - 1) * $scale;      

	$number = $total_record - $start;
	for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) {
      	mysqli_data_seek($result, $i); 		// 가져올 레코드로 위치(포인터) 이동      	
      	$row = mysqli_fetch_assoc($result); // 하나의 레코드 가져오기

	  	$num         = $row["num"];			// 일련번호
		$id        	 = $row["id"];			// 아이디
	  	$name        = $row["name"];		// 이름
	  	$subject     = $row["subject"];		// 제목
      	$regist_day  = $row["regist_day"]; 	// 작성일
        // $file_image = $row["file_name"]
		if ($row["file_name"])
      		$file_image = "<img src='../img/".$row["file_name"]."'>";
      	else
      		$file_image = " ";		  
?>
    <div class="img_manu">
		<div class="c_img">
			<a href="../php/commu_d_t.php?num=<?=$num?>&page=<?=$page?>">
				<?=$file_image?>
			</a>
		</div>	
		<a href="../php/commu_d_t.php?num=<?=$num?>&page=<?=$page?>" class="explan">
	
			
				<span class="col1">제목 :&nbsp;</span>	
				<span class="col2"><?=$subject?> |&nbsp</span>
				<span class="col3"><?=$name?> |&nbsp</span>
				<span class="col4">날자&nbsp;</span>
				<span class="col5"><?=$regist_day?></span>
			
		</a>	
    </div>
<?php
   	   $number--;
   	}
   	mysqli_close($con);
?>
        <button class="scroll-top" id="js-button" onclick="location.href='../php/board/form.php'">
            <i class="fa fa-chevron-up" aria-hidden="true">글쓰기</i>
        </button>
    </div>
<!-- 페이지 번호 매김 -->
<div class="c_num">
<?php
	if ($total_page>=2 && $page >= 2) {
		$new_page = $page-1;
		echo "<a href='../php/commu.php?page=$new_page'>◀ 이전</a>";
	}		
	else 
		echo "&nbsp;";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++) {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
			echo "<b> $i </b>";
		else
			echo "<a href='../php/commu.php?page=$i'> $i </a>";
   	}
   	if ($total_page>=2 && $page != $total_page)	{
		$new_page = $page+1;	
		echo " <a href='../php/commu.php?page=$new_page'>다음 ▶</a>";
	}
	else 
		echo "&nbsp;";		
?>
<!-- 페이지 번호 매김 끝 -->
</div>
</body>
</html>