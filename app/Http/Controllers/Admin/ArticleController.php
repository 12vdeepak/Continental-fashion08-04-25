<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.master-crud.article.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.master-crud.article.create');
    }

    public function store(ArticleRequest $request)
    {
        // Create a new Article instance
        $article = new Article();
        $article->article_name = $request->input('article_name');

        // Save to the database
        $article->save();

        // Redirect back to the index page
        return redirect()->route('article.index')->with('message', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.master-crud.article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        // Update article_name
        $article->article_name = $request->input('article_name');

        // Save changes to the database
        $article->save();

        return redirect()->route('article.index')->with('message', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Delete the record
        $article->delete();

        return redirect()->route('article.index')->with('message', 'Article deleted successfully.');
    }
}
