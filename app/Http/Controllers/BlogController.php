<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'img1' => 'required|image|mimes:jpeg,png,jpg,jfif',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,jfif',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,jfif',
            'social_url' => 'nullable|url',
        ]);



        $var = new Blog();
        $var->title = $request->title;
        $var->text = $request->text;
        $var->social_url = $request->social_url;

        foreach (['img1', 'img2', 'img3'] as $field) {
            if ($request->hasFile($field)) {
                $var->{$field} = $this->uploadBlogImage($request->file($field), $field);
            }
        }

        $var->save();
        session()->flash('successMsg', 'Blog added successfully!');
        return redirect()->route('admin.blog.index');
    }

 public function details(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return datatables()->of($data)
                ->addColumn('image', function($row){
                    if (!$row->primary_image_url) {
                        return '<span class="text-muted small">No image</span>';
                    }

                    return '<img src="'.$row->primary_image_url.'" alt="Blog Image" class="blog-img" width="70" height="70">';
                })
                ->addColumn('date', function($row){
                    return '<div class="d-flex align-items-center text-muted" style="font-size: 0.85rem;"><i class="fa-regular fa-calendar me-2"></i>'.$row->created_at->format('Y-m-d H:i').'</div>';
                })
                ->addColumn('edit_action', function($row){
                    return '<button type="button" class="action-btn action-edit edit-blog-btn" data-id="'.$row->id.'">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>';
                })
                ->addColumn('delete_action', function($row){
                    return '<button type="button" class="action-btn action-delete delete-blog-btn" data-id="'.$row->id.'">
                        <i class="fa-solid fa-trash-can"></i> Delete
                    </button>';
                })
                ->rawColumns(['image', 'date', 'edit_action', 'delete_action'])
                ->make(true);
        }

        $result['blogs'] = Blog::all();
        return view('admin.blog.details')->with($result);
    }
    
      public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'img1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'social_url' => 'nullable|url',
        ]);

        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->social_url = $request->social_url;

        $oldImages = collect([$blog->img1, $blog->img2, $blog->img3])->filter()->unique();

        foreach (['img1', 'img2', 'img3'] as $field) {
            if ($request->hasFile($field)) {
                $blog->{$field} = $this->uploadBlogImage($request->file($field), $field);
            }
        }

        $blog->save();

        $currentImages = collect([$blog->img1, $blog->img2, $blog->img3])->filter()->unique();
        $oldImages
            ->diff($currentImages)
            ->each(fn ($image) => $this->deleteBlogImage($image));

        return redirect()->route('admin.blog.details')->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        collect([$blog->img1, $blog->img2, $blog->img3])
            ->filter()
            ->unique()
            ->each(fn ($image) => $this->deleteBlogImage($image));

        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blog deleted successfully!',
        ]);
    }

    private function uploadBlogImage($image, string $field): string
    {
        $imageName = 'P' . time() . '_' . $field . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return $imageName;
    }

    private function deleteBlogImage(?string $image): void
    {
        $imagePath = public_path('uploads/' . $image);

        if ($image && File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
