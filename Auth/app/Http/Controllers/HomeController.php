<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Incomes;
use App\Models\Kisi;
use App\Models\UserToken;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        return view('homepage.welcome');
    }
    public function register(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email',
                'nickname' => 'required',
                'password' => 'required'
            ]);
            try{
                $is_nickname = Kisi::where('nickname', $request->input('nickname'))->exists();
                $is_email = Kisi::where('email', $request->input('email'))->exists();
                if($is_nickname || $is_email) {
                    $message = 'Kullanıcı adı veya email adresi kullanılmaktadır!';
                    return view('register', ['message' => $message]);
                } else {
                    $user = new Kisi();
                    $user->name = $request->input('name');
                    $user->surname = $request->input('surname');
                    $user->email = $request->input('email');
                    $user->nickname = $request->input('nickname');
                    $user->password = Hash::make($request->input('password'));
                    $user->created_at = Carbon::now();
                    $user->created_by = 1;
                    $user->save();
                    $message = 'Kayıt başarılı';
                    return redirect('/')->with(['message' => $message]);
                }
            }catch (\Exception $e){
                $message = 'Bir hata oluştu';
                return view('register', ['message' => $message, 'error' => $e->getMessage()]);
            }
        }
        return view('register');
    }
    public function list()
    {
        $expenses = Expenses::where('user_id', Session::get('user_id'))
            ->where('is_deleted',0)
            ->get();
        $incomes = Incomes::where('user_id', Session::get('user_id'))
            ->where('is_deleted',0)
            ->get();
        $result['expenses'] = $expenses;
        $result['incomes'] = $incomes;
        return view('list',$result);
    }
    public function save_expense(Request $request)
    {
        if($request->isMethod('post')) {
            try {
                $expense = new Expenses;
                $expense->user_id = Session::get('user_id');
                $expense->amount = $request->input('amount');
                $expense->category = $request->input('category');
                $expense->created_at = Carbon::now();
                $expense->created_by = Session::get('user_id');
                $expense->save();
                $data = [
                    'message' => 'Gider kaydedildi',
                    'status' => 'success',
                    'data' => $expense
                ];

                return Response()->json($data);
            }catch (\Exception $e){
                $data = [
                    'message' => 'Bir hata oluştu',
                    'status' => 'error',
                    'data' => $e->getMessage()
                ];
                return Response()->json($data);
            }
        }
        $expenses = Expenses::where('user_id', Session::get('user_id'))
            ->where('is_deleted',0)
            ->get();
        $result['expenses'] = $expenses;
        return view('expense',$result);
    }
    public function save_income(Request $request)
    {
        if($request->isMethod('post')) {
            $expense = new Incomes;
            $expense->user_id = Session::get('user_id');
            $expense->income = $request->input('income');
            $expense->category = $request->input('category');
            $expense->created_at = Carbon::now();
            $expense->created_by = Session::get('user_id');
            $expense->save();
            $message = 'Gelir kaydedildi';
            return redirect('/list')->with(['message' => $message]);
        }
        return view('incomes');
    }
}
