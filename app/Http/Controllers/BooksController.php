<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //Method untuk mnampilkan list post
    public function index()
    {
        return Book::all();
    }

    public function __construct()
    {
        //
    }


    //Method membuat post baru
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'author' => 'required'
        ]);

        return Book::create($request->all());
    }

    //Method untuk update buku post by Id
    public function update(Request $request, $id)
    {
        $post =Book::find($id);

        if($post){
            $post->update($request->all());

            return response ()->json([
                'updated' => true,
                'message' => 'updated'
            ],200 );
        }

        return response()->json([
            'message' => 'Book not found',
        ], 404);
    }
   
    //Method untuk menampilkan view post by Id
    public function show($id)
    {
        $post = Book::find($id);
        if(! $post){
            return response() ->json([
                'message' => 'Books Not Found',
            ], 404);
        }

        return $post;
    }
}