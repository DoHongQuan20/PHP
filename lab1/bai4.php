<?php
$seconds = 2000;

// Chuyển đổi giây thành phút và giây
$minutes = floor($seconds / 60);
$remainingSeconds = $seconds % 60;

// Chuyển đổi phút thành giờ và phút
$hours = floor($minutes / 60);
$remainingMinutes = $minutes % 60;

echo "2000 giây tương đương với: $hours giờ, $remainingMinutes phút, $remainingSeconds giây.";
?>