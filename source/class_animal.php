<?php

/**
 * 动物种类的枚举
 */
enum AnimalType: string {
    case ANIMAL = "animal";
    case CAT = "cat";
    case DOG = "dog";
}

interface iAnimal
{
    public function getName(): string;
    public function sound(): string;
}
interface iColor
{
    public function getColor(): string;
}

/**
 * Animal类
 */
class Animal implements iColor, iAnimal{
    private AnimalType $type;
    private $color = "白色";
    private $name = "动物";
    public static $animal_foo = 'bar';

    public function __construct(AnimalType $type) {
        $this->type = $type;
    }

    public function getAnimalFoo() {
        return self::$animal_foo;
        // return $this->animal_foo; // 静态属性不能使用$this->访问，必须使用self访问。
    }
    public function getType(): AnimalType {
        return $this->type;
    }
    
    public function getName(): string {
        return $this->name;
    }
    public function sound(): string {
        return "sound from animal";
    }
    /**
     * Summary of getColor
     * @return string
     */
    public function getColor(): string {
        return $this->color;
    }
}

class Cat extends Animal {
    public function sound():string {
        return "喵喵喵";
    }
}

class Dog extends Animal {
    public function sound():string {
        return "汪汪汪";
    }
}

/**
 * 动物的叫声
 * @param Animal $animal
 * @return void
 */
function makeSound(Animal $animal) {
    echo $animal->sound()."\n";
}

?>