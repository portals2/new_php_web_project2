<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web_p2/css/header_t.css">
    <!-- 
        html에서는 /css로 시작하고 php에서는 /web_p2/css처럼
        루트 디렉토리부터 시작해야함
    -->
    <title>header</title>
</head>
<body>
    <div class="h_container">
        <div class="header" id="h_item">
            <a class="symbol" href=""><img src="/web_p2/img/P.png" alt="asd"></a>
            <div class="ser">
                <input type="text" placeholder="검색어 입력" style="width:400px;height:50px">
                <button style="height:55px; width:60px">검색</button>
            </div>
            <!-- php로 로그인 전 만들기 -->
            <div class="menu">
                <a href="" class="but">장바구니</a>
                <a href="" class="but">마이페이지</a>
            </div>
        </div>
        <div class="sec_menu" id="h_item">
            <div class="menu2">
                <a href="" class="but">홈</a>
                <a href="" class="but">랭킹</a>
                <a href="" class="but">커뮤니티</a>
        </div>
        </div>
        <div class="rank" id="h_item">
            <select name="job" style="width:100px;">
                <option value="인기" selected="selected">인기순</option>
                <option value="판매">판매량순</option>
                <option value="좋아요" >좋아요</option>
            </select>
        </div>
    </div>
</body>
</html>