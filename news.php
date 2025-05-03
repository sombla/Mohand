<?php
// تحميل الأخبار من ملف JSON
$file = 'news.json';
$news = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مراسل حر - الأخبار</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Cairo', sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    .news-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }
    .news-card {
      background: #fff;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .news-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }
    .news-card h3 {
      margin: 15px 0 10px;
      font-size: 20px;
      color: #007bff;
    }
    .news-card p {
      color: #555;
      font-size: 16px;
    }
    .news-card small {
      color: #999;
    }
  </style>
</head>
<body>

<h1>آخر الأخبار من مراسل حر</h1>

<div class="news-container">
  <?php foreach ($news as $item): ?>
    <div class="news-card">
      <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="صورة الخبر">
      <h3><?php echo htmlspecialchars($item['title']); ?></h3>
      <small><?php echo htmlspecialchars($item['category']); ?> | <?php echo htmlspecialchars($item['date']); ?></small>
      <p><?php echo nl2br(htmlspecialchars(mb_substr($item['content'], 0, 100))) . '...'; ?></p>
    </div>
  <?php endforeach; ?>
</div>

</body>
</html>