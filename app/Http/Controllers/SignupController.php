<?php

namespace App\Http\Controllers;

use App\Rules\TokyoAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        //半角を全角に
        $address=mb_convert_kana($request->input('address'),'A');
        $request->merge(compact('address'));

        $data=$request->validate([
            'name'=>['required','string','max:20'],
            'email'=>['required','email:filter',Rule::unique('users')],
            'password'=>['required','string','min:8'],
            // 'address'=>['required_if:pref,東京'],
            // 'address'=>[new TokyoAddress($request->input('pref'))],
        ]);
        //■(required,filled,accepted などの存在チェック系)
        //とにかくチェックが走る

        //■一般系(stringなど)
        //(1)入力があるときは、チェックは走る
        //(2)項目は存在して、値がnullの場合、チェックは走る。(但し 'nullable' の指定があれば走らない)
        //(3)項目が存在しない場合や空文字列の場合、チェックは走らない。

        $user=User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password'])
        ]);

        Auth::login($user);

        // $request->dd();
        return redirect('mypage');
    }
}
