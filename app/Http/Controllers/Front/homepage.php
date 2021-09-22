<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

//models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;

use Illuminate\Http\Request;

class homepage extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'DESC')->paginate(2);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, "Böyle bir kategori bulunamadı");
        $article = Article::where('slug', $slug)->where('category_id', $category->id)->first() ?? abort(404, "Böyle bir yazı bulunamadı");
        $article->increment('hit');
        $data['article'] = $article;
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->paginate(1);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.category', $data);
    }
}
