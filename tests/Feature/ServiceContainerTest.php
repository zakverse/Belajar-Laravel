<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function Symfony\Component\Translation\t;

class ServiceContainerTest extends TestCase
{
   public function testDependency()
    {
      // $foo = new Foo();
    // $bar = new Bar($foo);
    $foo1 = app()->make(Foo::class); //new Foo();
    $foo2 = app()->make(Foo::class);

    self::assertEquals('foo', $foo1->foo());
    self::assertEquals('foo', $foo2->foo());

    self::assertNotSame($foo1, $foo2);
    }


    public function testBind()
    {
    //   $persosn1 = app()->make(Person::class);
    //   self::assertNotNull($persosn1);


    $this->app->bind(Person::class, function($app){
        return new Person("Dzaki", "Programmer");
    });

    $person1 = app()->make(Person::class); //|new Person("Dzaki", "Programmer");
    $person2 = app()->make(Person::class); //|menggagil fungsi closure yang sudah di bind

    self::assertEquals('Dzaki Programmer', $person1->firstName . ' ' . $person1->lastName);
    self::assertEquals('Dzaki Programmer', $person2->firstName . ' ' . $person2->lastName);
    }


    public function testSingleton()
    {
    

    $this->app->singleton(Person::class, function($app){
        return new Person("Dzaki", "Programmer");
    });

    $person1 = app()->make(Person::class); //|new Person("Dzaki", "Programmer");
    $person2 = app()->make(Person::class); //|menggagil fungsi closure yang sudah di bind

    self::assertEquals('Dzaki Programmer', $person1->firstName . ' ' . $person1->lastName);
    self::assertEquals('Dzaki Programmer', $person2->firstName . ' ' . $person2->lastName);
    self::assertSame($person1, $person2);
    }


   public function testInstance(){
    $person = new Person("Dzaki", "Programmer");
    $this->app->instance(Person::class, $person);

    $person1 = $this->app->make(Person::class); //mengambil objek yang sudah di instance
    $person2 = $this->app->make(Person::class);

    self::assertEquals('Dzaki Programmer', $person1->firstName . ' ' . $person1->lastName);
    self::assertEquals('Dzaki Programmer', $person2->firstName . ' ' . $person2->lastName);
    self::assertSame($person1, $person2);
   }
       

   public function testDependencyInjection(){

   $this->app->singleton(Foo::class, function($app){
    return new Foo();
   });

   $this->app->singleton(Bar::class, function($app){
    return new Bar($app->make(Foo::class));
   });

    $foo = $this->app->make(Foo::class);
    $bar1 = $this->app->make(Bar::class);
    $bar2 = $this->app->make(Bar::class);

    self::assertSame('foo and bar', $bar1->bar());
    self::assertSame($bar1, $bar2);
   }


    public function testInterfaceToClass()
    {
        //versi 1
       // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        //versi 2
         $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);
        self::assertEquals('Halo, Dzaki!', $helloService->hello("Dzaki"));
    }   

    

}