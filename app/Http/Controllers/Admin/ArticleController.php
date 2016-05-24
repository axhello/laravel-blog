<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $cates = Category::getCategoryArray();
        $tags = Tag::getTagArray();
        return view('admin.articles.create', compact('cates', 'tags'));
    }

    public function store(Requests\ArticlesRequest $request)
    {
        $data = ['user_id' => \Auth::user()->id];
        $article = Article::create(array_merge($request->all(), $data));
        $tag_lists = $request->get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if ($article) {
            Article::attachTags($article, $tag_list);
            return redirect('/admin/articles');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $cates = Category::getCategoryArray();
        $tags = Tag::getTagArray();
        return view('admin.articles.edit', compact('article', 'cates', 'tags'));
    }

    public function update(Requests\ArticlesRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        $tag_lists = $request->get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if ($article->save()) {
            Article::syncTags($article, $tag_list);
            return redirect('admin/articles')->with('success', '成功更新了一篇文章!');
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * 软删除
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $destory = Article::findOrFail($id)->delete();
        if ($destory) {
            return redirect('admin/articles')->with('info', '已移至回收站!!');
        }
        return redirect()->back()->with('errors', '删除失败!');
    }

    //回收站文章
    public function recycle()
    {
        $articles = Article::onlyTrashed()->paginate(15);
        return view('admin.articles.recycle', compact('articles'));
    }

    //恢复文章
    public function restore($id)
    {
        $restore = Article::withTrashed()->where('id', $id)->restore();
        if ($restore) {
            return redirect('admin/articles')->with('success', '成功恢复了一篇文章!');
        } else {
            return redirect()->back()->with('errors', '恢复失败!');
        }
    }

    //彻底删除
    public function delete($id)
    {
        $delete = Article::withTrashed()->where('id', $id)->forceDelete();
        if ($delete) {
            return redirect('admin/articles/recycle')->with('success', '已将文章从数据库中删除！');
        } else {
            return redirect()->back()->with('errors', '删除失败！');
        }
    }
}
