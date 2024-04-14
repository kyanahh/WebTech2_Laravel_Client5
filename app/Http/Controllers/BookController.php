<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class BookController extends Controller
{

    public function landingpage()
    {
        return view('books.landingpage');
    }

    public function loginpage()
    {
        return view('books.loginpage');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect()->route('log');
    }

    public function createaccount()
    {
        return view('books.createaccount');
    }

    public function createuser(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log in the newly created user
        auth()->login($user);

        return redirect()->route('home')->withSuccess('Account created successfully');
    }

    public function homepage()
    {
        return view('books.homepage');
    }

    public function booklist()
    {
        $user = auth()->user();
        $books = $user->books()->paginate(6);
        return view('books.booklist', ['books' => $books]);
    }

    public function addbook()
    {
        return view('books.addbook');
    }
    /**
     * Display a listing of the resourc
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // validate data
                $request->validate([
                    'title' => 'required',
                    'author' => 'required',
                    'yearbook' => 'required'
                ]);
        
                $books = new Book;
                $books->title = $request->title;
                $books->author = $request->author;
                $books->yearbook = $request->yearbook;
                $books->user_id = auth()->user()->id;
                $books->save();
        
                return back()->withSuccess('Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Book::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validate data
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'yearbook' => 'required'
        ]);

        // Fetch the product from the database
        $books = Book::findOrFail($id);

        $books->title = $request->title;
        $books->author = $request->author;
        $books->yearbook = $request->yearbook;
        $books->save();

        return redirect()->route('tables', ['books' => $books])->withSuccess('Book information successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return redirect()->route('tables')->withSuccess('Book Data Deleted');
    }
}
