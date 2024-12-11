<?php

namespace Utils;

class Test 
{
    // 构造函数，缺省也可以
    public function __construct() {}

    /**
     * array数组尝试
     * 1.数值型数组；即其他语言的数组、集合、切片
     * 2.key-value数组；类似与hashmap
     * 3.多维数组
     * @return void
     */
    public static function array_try() 
    {
        // $brands = array("YY", "Lining", "Victor");
        // 这个可以替代上面的申明，即使用[]替换array();
        $brands = ["YY", "Lining", "Victor"];
        // 遍历一
        foreach ($brands as $brand) {
            echo "brand: ". $brand."\n";
        }
        // 遍历二
        $n = count($brands); // 数组长度
        for ($i = 0; $i < $n; $i++) {
            echo $i.": ".$brands[$i].PHP_EOL;
        }

        echo "I like ". $brands[0].PHP_EOL;

        // key-value类型的数组
        $kv = [
            "a"=>1,
            "b"=>2,
        ];
        // 遍历一
        foreach ($kv as $k => $v) {
            echo "". $k ."=". $v . PHP_EOL;
        }

        // 多维数组
        $md = [
            [1, 'yy'],
            [2, 'victor'],
            [3, 'lining'],
        ];
        foreach ($md as $idx => $v) {
            print_r($v);
            // echo 'md'. $k .'='. $v . PHP_EOL;
        }

        $cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel", "Benz");
        echo "print_r ==== ";
        print_r(array_chunk($cars,2));
        array_push($cars, "su7", "Nio", "xiaopeng");
        print_r($cars);
    }

    /**
     * 文件夹
     * @return void
     */
    public static function dir_try() 
    {
        echo "--------------- dir --------------\n";

        $pwd = getcwd();
        echo "pwd = ", $pwd, PHP_EOL;

        $d = dir($pwd);
        echo print_r($d).PHP_EOL;
    }

    /**
     * date函数测试
     * @return void
     */
    public static function date_try()
    {
        // 获取UTC时区的时间
        $d = date(DATE_RFC3339);
        echo "date = ". $d . PHP_EOL;

        $ts = time();
        echo "时间戳：". $ts.PHP_EOL;
        echo "格式化：". date(DATE_RFC3339, $ts).PHP_EOL;
        echo "格式化：". date('Y-m-d H:i:s', $ts).PHP_EOL;

        // echo "sun info: ", print_r(date_sun_info($ts, 104.065735, 30.659462)), PHP_EOL;
        // echo "sunrise:", date_sunrise($ts);
        // echo "sunset:", date_sunset($ts);

        // echo print_r(getdate()), PHP_EOL;

        $lt = localtime();
        echo "------------------\n";
        // echo print_r($lt), PHP_EOL;
    }


}


?>