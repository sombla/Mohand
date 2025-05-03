<?php
// التأكد من وجود معرف الخبر
if (!isset($_GET['id'])) {
  die('خبر غير موجود');
}

// تحميل الأخبار
$file = 'news.json';
$news = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// البحث عن الخبر المطلوب
$newsId = (int)$_GET['id'];
$singleNews = $news[$newsId] ?? null;

if (!$singleNews) {
  die('خبر غير موجود');
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($singleNews['title']); ?> - مراسل حر</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background: #fafafa;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h1 {
      color: #333;
    }
    img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 20px;
    }
    p {
      font-size: 18px;
      color: #444;
      line-height: 1.7;
    }
    small {
      color: #777;
      display: block;
      margin-bottom: 15px;
    }
    a {
      text-decoration: none;
      color: #007bff;
      display: inline-block;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <img src="<?php echo htmlspecialchars($singleNews['image']); ?>" alt="صورة الخبر">
  <h1><?php echo htmlspecialchars($singleNews['title']); ?></h1>
  <small>التصنيف: <?php echo htmlspecialchars($singleNews['category']); ?> | التاريخ: <?php echo htmlspecialchars($singleNews['date']); ?></small>
  <p><?php echo nl2br(htmlspecialchars($singleNews['content'])); ?></p>

  <a href="news.php">← العودة إلى الأخبار</a>
</div>

</body>
</html>sa