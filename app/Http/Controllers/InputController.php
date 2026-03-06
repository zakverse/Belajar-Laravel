<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return "Hello, " . $name . "!";
    }

    public function helloFirstName(Request $request): string
    {
       $firstName = $request->input('name.first');
       return "Hello, " . $firstName . "!";
    }

    public function helloInput(Request $request): string
    {
      $input = $request->input();
      return json_encode($input);
    }


    public function helloaArray(Request $request): string
    {
        $name = $request->input('product.*.name');
        return json_encode($name);
    }

    public function inputType(Request $request): string
    {
        $name = $request->input('name');
        $maried = $request->boolean('married');
        $birthDate = $request->date('birth_date', 'Y-m-d');

        return json_encode([
            'name' => $name,
            'married' => $maried,
            'birth_date' => $birthDate->format('Y-m-d')
        ]);
        

    }


    public function filterOnly(Request $request): string
    {
        $name = $request->only(['name.first', 'name.last']);
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        $user = $request->except(['admin']);
        return json_encode($user);
    }

    public function filterMerge(Request $request): string
    {
        $user = $request->merge(['admin' => 'false'])->all();
        return json_encode($user);
    }


















}