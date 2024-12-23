<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Timer</title>
    <script>
        // Hàm để lấy Max-Age từ cookie
        function getCookieMaxAge(cookieName) {
            const cookies = document.cookie.split("; ");
            for (let cookie of cookies) {
                const [name, value] = cookie.split("=");
                if (name === cookieName) {
                    // Giả sử cookie Max-Age được thiết lập trong server
                    const match = document.cookie.match(/Max-Age=(\d+)/);
                    return match ? parseInt(match[1], 10) : null;
                }
            }
            return null;
        }

        // Hàm hiển thị thời gian còn lại
        function displayRemainingTime(cookieName, elementId) {
            const maxAge = getCookieMaxAge(cookieName);

            if (maxAge === null) {
                document.getElementById(elementId).innerText = "Cookie không có hoặc không có Max-Age.";
                return;
            }

            let remainingTime = maxAge;

            // Cập nhật thời gian mỗi giây
            const interval = setInterval(() => {
                if (remainingTime <= 0) {
                    document.getElementById(elementId).innerText = "Cookie đã hết hạn!";
                    clearInterval(interval);
                } else {
                    document.getElementById(elementId).innerText = `Còn lại: ${remainingTime--} giây`;
                }
            }, 1000);
        }

        // Gọi hàm theo dõi cookie khi trang load
        document.addEventListener("DOMContentLoaded", () => {
            displayRemainingTime("session", "cookie-timer");
        });
    </script>
</head>
<body>
    <h1>Kiểm tra thời gian còn lại của cookie</h1>
    <p id="cookie-timer">Đang kiểm tra...</p>
</body>
</html>
