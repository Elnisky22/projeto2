<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->user_id = Auth::user()->id;
        $book->is_loaned = false;
        
        $book->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $dono = User::find($book->user_id);
        return view('detalhes', compact('book', 'dono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('editBook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');

        $book->update();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('home');
    }

    public function loan($id)
    {
        $book = Book::find($id);
        $book->loaner_id = Auth::user()->id;
        $book->loan_date = date('Y-m-d H:i:s');
        $book->is_loaned = true;

        $book->update();
        return redirect()->route('home');
    }

    public function devolution($id)
    {
        $book = Book::find($id);
        $book->is_loaned = false;

        $book->update();
        return redirect()->route('home');
    }

    public static function getLoaner($id)
    {
        return User::find($id);
    }
}
