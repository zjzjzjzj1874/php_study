<?php

/**
 * student
 */
class student {
    public $name; // 名字
    public $age; // 年龄
    public $gender; // 性别

    // 构造函数
    public function __construct($name, $age=18, $gender=1) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function get_name() {
        return $this->name;
    }
    public function get_age() {
        return $this->age;
    }
    public function get_gender() {
        return $this->gender;
    }
    public function set_name($name) {
        $this->name = $name;
    }
    public function set_age($age) {
        $this->age = $age;
    }
    public function set_gender($gender) {
        $this->gender = $gender;
    }

    /**
     * _toString
     * @return string
     */
    public function __toString() {
        return 'name: '.$this->name.'; age: '.$this->age.'; gender: '.($this->gender == 1?'男':'女').".\n";
    }

    /**
     * run: 跑步方法的实现
     * @return string
     */
    public function run() {
        return "我是" . $this->name . ", 我喜欢跑步.\n";
    }
}

?>