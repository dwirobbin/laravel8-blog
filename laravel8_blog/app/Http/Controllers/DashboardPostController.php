<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('layouts.back.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('layouts.back.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // untuk ngecek upload gambar
        // return $request->file('image')->store('post-images');

        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'mimes:jpg,jpeg,bmp, png,giv,svg|max:2048',
            'body' => 'required',
            'category_id' => 'required'
        ];

        $messages = [
            'title.required' => 'judul tidak boleh kosong',
            'title.max' => 'judul harus maksimal 255 karakter',
            'slug.required' => 'slug tidak boleh kosong',
            'slug.unique' => 'slug sudah digunakan',
            'image.mimes' => 'image harus berformat .jpg, .jpeg, .png, .bmp, .giv, .svg',
            'image.max' => 'image harus maksimal berukuran 2 MB ',
            'body.required' => 'body tidak boleh kosong',
            'category_id.required' => 'category tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);

        $storage = 'storage/body-content';
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $imageNameBody = uniqid();
                $mimeType = $groups['mime'];
                $imageNameBodyRand = substr(md5($imageNameBody), 6, 6) . '_' . time();
                $imagePath = ("$storage/$imageNameBodyRand.$mimeType");
                $image = Image::make($src)
                    ->resize(900, 400)
                    ->encode($mimeType)
                    ->save(public_path($imagePath));
                $newSrc = asset($imagePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $newSrc);
                $img->setAttribute('class', 'img-fluid');
            }
        }

        $imageName = null;

        if ($request->file('image')) {
            $imageNameBody = uniqid();
            $imageName = substr(md5($imageNameBody), 6, 6) . '_' . time() . '.' . $request->image->extension();
            $rules['image'] = $request->file('image')->storeAs('post-images', $imageName);
        }

        Post::create([
            'title' => Str::title($request->title),
            'slug' => $request->slug,
            'image' => $imageName,
            // 'body' => $request->body,
            'body' => $dom->saveHTML(),
            'image_body' => str_replace(URL::to('/') . '/storage/body-content/', '', $newSrc),
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/dashboard/posts')->with('success', 'New Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('layouts.back.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('layouts.back.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,bmp,png,giv,svg|max:2048',
            'body' => 'required',
            'category_id' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $messages = [
            'title.required' => 'judul tidak boleh kosong',
            'title.max' => 'judul harus maksimal 255 karakter',
            'slug.required' => 'slug tidak boleh kosong',
            'slug.unique' => 'slug sudah digunakan',
            'image.mimes' => 'image harus berformat .jpg, .jpeg, .png, .bmp, .giv, .svg',
            'image.max' => 'image harus maksimal berukuran 2 MB ',
            'body.required' => 'body tidak boleh kosong',
            'category_id.required' => 'category tidak boleh kosong'
        ];

        $this->validate($request, $rules, $messages);

        $storage = 'storage/body-content';
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $imageNameBody = uniqid();
                $mimeType = $groups['mime'];
                $imageNameBodyRand = substr(md5($imageNameBody), 6, 6) . '_' . time();
                $imagePath = ("$storage/$imageNameBodyRand.$mimeType");
                $image = Image::make($src)
                    ->resize(900, 400)
                    ->encode($mimeType)
                    ->save(public_path($imagePath));
                $newSrc = asset($imagePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $newSrc);
                $img->setAttribute('class', 'img-fluid');
            }
        }

        $imageName = $post->image;

        if ($request->file('image')) {
            if (File::exists('storage/post-images/' . $post->image)) {
                File::delete('storage/post-images/' . $post->image);
            }

            $imageNameBody = uniqid();
            $imageName = substr(md5($imageNameBody), 6, 6) . '_' . time() . '.' . $request->image->extension();
            $rules['image'] = $request->file('image')->storeAs('post-images', $imageName);
        }

        Post::where('id', $post->id)->update([
            'title' => Str::title($request->title),
            'slug' => $request->slug,
            'image' => $imageName,
            // 'body' => $request->body,
            'body' => $dom->saveHTML(),
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (File::exists('storage/post-images/' . $post->image)) {
            File::delete('storage/post-images/' . $post->image);
        }

        if (File::exists('storage/body-content/' . $post->image_body)) {
            File::delete('storage/body-content/' . $post->image_body);
        }

        // $files = array_filter(glob('storage/body-content/*'), 'is_file');

        // foreach ($files as $file) {
        //     File::delete($file);
        // }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug =  SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function imageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path =  $request->file('image')->storeAs('body-content', $fileNameToStore);
        }

        return response()->json([
            'imageUrl' => asset('storage/' . $path)
        ]);
    }

    public function imageDelete()
    {
        $src = $_POST['src'];
        if (isset($src)) {
            $file_name = str_replace(URL::to('/') . '/', '', $src);
            if (unlink($file_name)) {
                echo "Delete image succesfull";
            }
        }
    }
}

// Cara lain
// $imageName = $request->oldImage;

// if ($request->file('image')) {
//     if ($request->oldImage) {
//         Storage::delete('post-images/' . $request->oldImage);
//     }

//     $imageName = time() . '.' . $request->image->extension();
//     $rules['image'] = $request->file('image')->storeAs('post-images', $imageName);
// }
