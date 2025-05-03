<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // حفظ الصورة
    $image_name = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $image_name = $upload_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
    }

    // تحميل البيانات القديمة
    $file = 'news.json';
    $news = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // إضافة الخبر الجديد
    $news[] = [
        'title' => $title,
        'category' => $category,
        'content' => $content,
        'image' => $image_name,
        'date' => date('Y-m-d H:i:s')
    ];

    // حفظ البيانات في ملف JSON
    file_put_contents($file, json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    echo "تم حفظ الخبر بنجاح!";
    echo '<br><a href="index.html">العودة إلى لوحة التحكم</a>';
}
?>