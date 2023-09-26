<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{


    public function index()
    {
        // Fetch all articles from the database
        $articles = Article::all();

        // Return the view with the articles
        return view('articles.index', ['articles' => $articles]);
    }

    public function edit(Request $request)
    {
        // Fetch the article
        $article = Article::find($request->id);

        // Return the view with the article
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request)
    {
        // Fetch the article
        $article = Article::find($request->id);

        // Update the article
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        // Redirect to the article index
        return redirect()->route('articles.index');
    }



    public function show(Request $request)
    {
        // Fetch the article
        $article = Article::find($request->id);

        if (!$article) {
            // Handle the error, e.g., return a 404 not found response
            abort(404, 'Article not found');
        }

        // Return the view with the article
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        // Return the view with the article
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create the article
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Article::create($input);

        // Redirect to the article index
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }

}