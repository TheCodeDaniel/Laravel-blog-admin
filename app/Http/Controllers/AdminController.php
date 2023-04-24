<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // page function
    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        if (session()->has('blog_admin_name')) {
            $data = DB::table('blog_posts')
                ->get();
            return view('dash.dashboard', compact('data'));
        } else {
            return redirect('/');
        }
    }

    public function createPage()
    {
        if (session()->has('blog_admin_name')) {
            return view('dash.create');
        } else {
            return redirect('/');
        }
    }

    public function blog_set($id)
    {
        if (session()->has('blog_admin_name')) {
            $data = DB::table('blog_posts')
                ->where('id', $id)
                ->first();
            return view('dash.blog_settings', compact('data'));
        } else {
            return redirect('/');
        }
    }


    // action functtions

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:4',
        ]);

        $admin = DB::table('admin')
            ->where('name', $request->name)
            ->where('password', $request->password)
            ->first();
        if ($admin) {
            $request->session()->put('blog_admin_name', $request->name);
            return redirect()->route('dash');
        } else {
            return back()->with('error', 'failed to login');
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string',
            'blog_slug' => 'required|string',
            'blog_description' => 'required|string|min:10',
        ]);

        $date = Carbon::now()->format('Y-m-d H:i:s');

        $addQuery = DB::table('blog_posts')
            ->insert([
                "title" => $request->blog_title,
                "slug" => $request->blog_slug,
                "description" => $request->blog_description,
                "created_at" => $date,
            ]);
        if ($addQuery) {
            return back()->with('success', 'blog posted successfully');
        } else {
            return back()->with('error', 'failed to post blog :(');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_title' => 'required|string',
            'blog_slug' => 'required|string',
            'blog_description' => 'required|string|min:10',
        ]);

        $date = Carbon::now()->format('Y-m-d H:i:s');

        $addQuery = DB::table('blog_posts')
            ->where("id", $id)
            ->update([
                "title" => $request->blog_title,
                "slug" => $request->blog_slug,
                "description" => $request->blog_description,
                "updated_at" => $date,
            ]);
        if ($addQuery) {
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'update failed, an error occurred');
        }
    }

    public function deletepost($id)
    {
        DB::table('blog_posts')
            ->where('id', $id)
            ->delete();
        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->pull('blog_admin_name');
        return redirect('/');
    }
}
