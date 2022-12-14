<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function uploadImage($image, $path, $width, $height)
    {

        $new_image_name = date('YmdHis') . $image->getClientOriginalName();
        $resized_image = Image::make($image)->resize($width, $height);
        $resized_image->save($path . $new_image_name, 80);
        return $new_image_name;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<div class="btn-group btn-space">
                    <a href="/dashboard/admin/posts/edit/' . $data->id . '" class="btn btn-success" type="button">Düzenle</a>
                    <a href="/dashboard/admin/posts/delete/' . $data->id . '" class="btn btn-danger" type="button">Sil</a>
                    </div>';
                    return $actionBtn;
                })
                ->addColumn('category', function ($data) {
                    return $data->category->cat_name;
                })
                ->editColumn('post_title', function ($data) {
                    return str()->limit($data->post_title, 30);
                })
                ->editColumn('post_summary', function ($data) {
                    return str()->limit($data->post_summary, 40);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $button = '<a href="/dashboard/admin/posts/status/update/' . $data->id . '" class="btn btn-space btn-success active"><i
                      class="icon icon-left mdi mdi-check"></i>Aktif</a>';
                        return $button;
                    } else {
                        $button = '<a href="/dashboard/admin/posts/status/update/' . $data->id . '"
                        class="btn btn-space btn-danger active"><i
                            class="icon icon-left mdi mdi-alert-circle"></i>Pasif</a>';

                        return $button;
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.admin.posts.index');
    }
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('dashboard.admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'author_email' => 'required',
            'post_title' => 'required',
            'post_summary' => 'required',
            'post_content' => 'required',
        ]);
        $input = $request->all();
        if ($request->has('post_image')) {
            $path = 'storage/posts/images/';
            $post_image = $this->uploadImage($request->post_image, $path, 300, 300);
            $input['post_image'] = $post_image;
        }

        if ($request->has('post_banner')) {
            $path = 'storage/posts/banners/';
            $post_banner = $this->uploadImage($request->post_banner, $path, 1200, 600);
            $input['post_banner'] = $post_banner;
        }

        $input['post_slug'] = str()->slug($request->post_title);
        Post::create($input);
        toastr()->success('Post saved successfully', 'Post');
        return back();
    }

    public function edit($id)
    {
        $categories = Category::where('status', 1)->get();
        $post = Post::find($id);
        return view('dashboard.admin.posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'post_title' => 'required',
            'post_summary' => 'required',
            'post_content' => 'required',
        ]);
        $post = Post::find($id);
        $input = $request->all();
        if ($request->has('post_image')) {
            $path = 'storage/posts/images/';
            $post_image = $this->uploadImage($request->post_image, $path, 300, 300);
            $input['post_image'] = $post_image;
        }
        if ($request->has('post_banner')) {
            $path = 'storage/posts/banners/';
            $post_banner = $this->uploadImage($request->post_banner, $path, 1200, 600);
            $input['post_banner'] = $post_banner;
        }
        $input['post_slug'] = str()->slug($request->post_title);
        
        $post->update($input);
        toastr()->success('Başarıyla Kaydedildi', 'Yazı');
        return back();
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        toastr()->success('Başarıyla Silindi', 'Yazı');
        return back();
    }

    public function post($slug)
    {
        $post = Post::where('post_slug', $slug)->first();
        return view('frontend.post', compact('post'));
    }

    public function updateStatus($id)
    {
        $post = Post::find($id);
        if ($post->status == 1) {
            $post->status = 0;
            $post->save();
        } else {
            $post->status = 1;
            $post->save();
        }
        toastr()->success('Statü Güncellendi', 'Yazı');
        return back();
    }
}
