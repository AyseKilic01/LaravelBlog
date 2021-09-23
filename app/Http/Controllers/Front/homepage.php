<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Mail;
use Validator;
//models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

use Illuminate\Http\Request;

class homepage extends Controller
{
    public function __construct(){
        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Category::inRandomOrder()->get());
    }
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'DESC')->paginate(2);
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::where('slug', $category)->first() ?? abort(404, "Böyle bir kategori bulunamadı");
        $article = Article::where('slug', $slug)->where('category_id', $category->id)->first() ?? abort(404, "Böyle bir yazı bulunamadı");
        $article->increment('hit');
        $data['article'] = $article;
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first() ?? abort(404, 'Böyle bir kategori bulunamadı.');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->paginate(1);
        return view('front.category', $data);
    }
    public function page($slug){
        $page=Page::where('slug',$slug)->first() ?? abort(404,'Böyle bir sayfa bulunamadı.');
        $data['page']=$page;
        return view('front.page',$data);
    }
    public function contact(){
        return view('front.contact');
    }
    public function contactpost(Request $request){
    $rules=[
        'name'=>'required|min:5',
        'mail'=>'required|email',
        'topic'=>'required',
        'message'=>'required|min:10'
    ];
    $validate=Validator::make($request->post(),$rules);

    if($validate->fails()){
        return redirect()->route('contact')->withErrors($validate)->withInput();
    }

    // $contact = new Contact;
    // $contact->name=$request->name;
    // $contact->email=$request->email;
    // $contact->topic=$request->topic;
    // $contact->message=$request->message;
    // $contact->save();
    return redirect()->route('contact')->with('success','Mesajınız bize iletildi. Teşekkür ederiz!');
}
}
