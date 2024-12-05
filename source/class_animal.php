<?php

/**
 * 动物种类的枚举
 */
enum AnimalType: string {
    case ANIMAL = "animal";
    case CAT = "cat";
    case DOG = "dog";
}

/**
 * Animal类
 */
class Animal {
    private AnimalType $type;

    public function __construct(AnimalType $type) {
        $this->type = $type;
    }
    public function getType(): AnimalType {
        return $this->type;
    }
    /**
     * Animal的sound();
     * @return string
     */
    public function sound() {
        return "sound from animal";
    }
}

class Cat extends Animal {
    public function sound() {
        return "喵喵喵";
    }
}

class Dog extends Animal {
    public function sound() {
        return "汪汪汪";
    }
}

function makeSound(Animal $animal) {
    echo $animal->sound()."\n";
}

?>