<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function books()
    {
        $data = Book::paginate(5);
        return response()->json($data, 200);
    }

    public function book($id)
    {
        $data = Book::find($id)->first();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:60',
            'desc' => 'required',
            'writer' => 'required|string|max:60',
            'price' => 'required|string'
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        } else{
            $book = new Book;
            $book->name = $request->name;
            $book->desc = $request->desc;
            $book->writer = $request->writer;
            $book->price = $request->price;
            $book->save();
            return response()->json('Buku Berhasil ditambahkan!', 200);
        }
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id)->first();
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->writer = $request->writer;
        $book->price = $request->price;
        $book->save();
        return response()->json('Buku Berhasil diubah!', 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id)->first();
        $book->delete();
        return response()->json('Buku Berhasil dihapus!', 200);
    }

}
