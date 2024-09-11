<?php

namespace App\Http\Controllers\Back;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->get();

            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function($article){
                    return $article->Category->name;
                })
                ->addColumn('status', function($article){
                    return $article->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function($article){
                    $buttons = '<div class="text-center">
                                    <a href="article/'.$article->id.'" class="btn btn-secondary">Detail</a>';
                    
                    if (auth()->user()->role == 1 || auth()->user()->id == $article->user_id) {
                        $buttons .= '<a href="article/'. $article->id.'/edit" class="btn btn-primary">Edit</a>
                                     <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>';
                    }

                    $buttons .= '</div>';
                    return $buttons;
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.article.index');
    }

    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/back', $fileName);

        $data['user_id'] = auth()->user()->id;
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article'))->with('success', 'Articles Successfully Saved');
    }

    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::with('User', 'Category')->find($id)
        ]);
    }

    public function edit(string $id)
    {
        $article = Article::find($id);

        if (auth()->user()->role != 1 && auth()->user()->id != $article->user_id) {
            return back()->with('error', 'You do not have permission to edit this article.');
        }

        return view('back.article.update', [
            'article' => $article,
            'categories' => Category::get()
        ]);
    }

    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::find($id);

        if (auth()->user()->role != 1 && auth()->user()->id != $article->user_id) {
            return back()->with('error', 'You do not have permission to update this article.');
        }

        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'. $file->getClientOriginalExtension();
            $file->storeAs('public/back', $fileName);

            Storage::delete('public/back/'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['slug'] = Str::slug($data['title']);

        $article->update($data);

        return redirect(url('article'))->with('success', 'Articles Successfully Updated');
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);

        if (auth()->user()->role != 1 && auth()->user()->id != $article->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to delete this article.'
            ]);
        }

        if ($article) {
            Storage::delete('public/back/'.$article->img);
            $article->delete();

            return response()->json([
                'success' => true,
                'message' => 'This Article deleted successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Article not found'
        ]);
    }
}
