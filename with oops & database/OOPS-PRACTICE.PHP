<?php
// class base{
//     public $name,$age;
//     // public function __construct($name,$age){
//     //     $this->name=$name;
//     //     $this->age=$age;
//     // }

//     public function show($name,$age){
//         $this->name=$name;
//         $this->age=$age;
//         echo $this->name."=".$this->age;
//     }
// }
// class derived extends base{
//     public function show($name,$ag.e){
//         $this->name=$name;
//         $this->age=$age;
//         echo $this->name."=".$this->age;
//     }
// }
// $test_obj1=new derived();
// $test_obj1->show("param",22);

// $test_obj2=new base();
// $test_obj2->show("pk",22);

// interface a{
//     function add($a,$b);
//     function sub($c,$d);
// }
// interface b{
//     function multi();
// }
// class childclass implements a, b{
//     public function add($a,$b){
//         echo $a+$b;
//     }
//     public function sub($c,$d){
//         echo $c-$d;
//     }
//     public function multi(){
//         echo "hello";
//     }
// }

// $obj=new childclass();
// $obj->add(5,5);
// echo "\n";
// $obj->sub(5,5);
// echo "\n";
// $obj->multi();

trait mytrait
{
    public $a = 5;
    public $b=5;
    public function add($a,$b){
        $this->a = $a;
        $this->b=$b;
    }
    public function show(){
        echo $this->a+$this->b;
    }
}
class myclass {
    use mytrait;
}
$obj=new myclass();
$obj->show();


?>