<?
    function GenerateWord($max = 10)
    {
        $char = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $size = strlen($char)-1;
        $key = null;
        while($max--) { $key.=$char[rand(0,$size)]; }
        return $key;
    }
?>