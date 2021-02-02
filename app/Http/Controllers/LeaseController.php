<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Lease;
use App\Book;

class LeaseController extends Controller
{
    public function lease(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $lease = Lease::where('user_id', $user->id)->first();
        $book = Book::find($request->book_id)->first();
        if($lease != null) {
            if($lease->book_id != $request->book_id){
                $lease = new Lease;
                $lease->book_id = $request->book_id;
                $lease->user_id = $user->id;
                $total = $book->price + 5000;
                $lease->price = ($total * 10) / 100;
                $lease->save();
                return response()->json('Buku Berhasil disewa!', 200);
            }
        } else {
            $lease = new Lease;
            $lease->book_id = $request->book_id;
            $lease->user_id = $user->id;
            $total = $book->price + 5000;
            $lease->price = ($total * 10) / 100;
            $lease->save();
            return response()->json('Buku Berhasil disewa!', 200);
        }
    }
}
