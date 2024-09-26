<?php
// 데이터베이스 연결 정보
$host = 'localhost'; // 호스트 주소
$db = 'stuffing'; // 데이터베이스 이름
$user = 'root'; // 데이터베이스 사용자
$pass = '1234'; // 데이터베이스 비밀번호

// MySQL 연결 시도
$conn = new mysqli($host, $user, $pass, $db);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 요청으로 데이터 받기
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 입력된 회원가입 정보 받기
    $name = $conn->real_escape_string($_POST['naver-name']);
    $signup_id = $conn->real_escape_string($_POST['naver-signup-id']);
    $email = $conn->real_escape_string($_POST['naver-email']);
    $password = $conn->real_escape_string($_POST['naver-signup-password']);

    // 비밀번호 해시 처리 (보안 강화)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 간단한 중복 체크 (아이디와 이메일 중복 확인)
    $checkQuery = "SELECT * FROM users WHERE user_id = '$signup_id' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "이미 사용 중인 아이디 또는 이메일입니다.";
    } else {
        // 회원 정보를 데이터베이스에 저장
        $sql = "INSERT INTO users (name, user_id, email, password) 
                VALUES ('$name', '$signup_id', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "회원가입이 성공적으로 완료되었습니다.";
        } else {
            echo "오류: " . $sql . "<br>" . $conn->error;
        }
    }
}

// 데이터베이스 연결 종료
$conn->close();
?>