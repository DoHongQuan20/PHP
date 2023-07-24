<?php
$a2 = "32"; // string 
settype($a2, "integer"); 
echo gettype($a2). "<br>";
;// $a is now integer => ép kiểu


//gettype : trả về kiểu dữ liệu
$a = 3;
echo gettype($a) . "<br>";

$b = 3.2;
echo gettype($b) . "<br>";

$c = "Hello";
echo gettype($c) . "<br>";


// str_contains($haystack, $needle);

/* $haystack là string bạn cần search.
$needle là string bạn muốn search trong $haystack.
Hàm str_contains sẽ trả về true nếu chuỗi $needle có trong chuỗi $haystack
và ngược lại sẽ trả về false nếu  chuỗi $needle không có trong chuỗi $haystack. */


$a = "Toidicode.Com" ;

if (str_ends_with($a, 'com')) {
    echo "Yes" . "<br>";
    ;
} else {
    echo "No". "<br>";
    ;
}

// str_starts_with($haystack, $needle); => có phân biệt chữ hoa chữ thường.

/* $haystack là string chúng ta cần kiểm tra.
$needle là chuỗi chúng ta muốn kiểm tra xem $haystack có bắt đầu bằng chuỗi đó không?
Hàm str_starts_with sẽ trả về true nếu chuỗi $haystack được bắt đầu bằng chuỗi $needle và ngược lại sẽ trả về false. */



$string = "Toidicode.Com";

if (str_ends_with($string, 'com')) {
    echo "Yes". "<br>";
    ;
} else {
    echo "No". "<br>";
}


// str_ends_with($haystack, $needle);

/*$haystack là string chúng ta cần kiểm tra.
$needle là chuỗi chúng ta muốn kiểm tra xem $haystack có kết thúc bằng chuỗi đó không?
Hàm str_ends_with sẽ trả về true nếu chuỗi $haystack được kết thúc bằng chuỗi $needle và ngược lại sẽ trả về false. */
?>
