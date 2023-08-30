<?php
namespace App\Healper;
use App\Models\Wallet;

class UUIDGenerate{
    public static function accountNumber(){
        $number= mt_rand(100000000000000 , 999999999999999);
        if(Wallet::where('account_number' , $number)->exists()){
            self::accountNumber();
        }
        return $number;
    }
}

?>