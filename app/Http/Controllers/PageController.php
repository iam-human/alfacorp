<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Partner;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $heroes = Hero::where('is_active', true)->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $portfolios = Portfolio::with('category')->where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $teams = Team::where('is_active', true)->orderBy('sort_order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->get();
        $blogs = Blog::with('category')->where('status', 'published')->latest('published_at')->take(3)->get();
        $partners = Partner::all();
        
        return view('pages.home', compact('heroes', 'services', 'portfolios', 'teams', 'testimonials', 'blogs', 'partners'));
    }

    public function about()
    {
        $teams = Team::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.about', compact('teams'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.services', compact('services'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::where('slug', '!=', $slug)->where('is_active', true)->take(4)->get();
        return view('pages.service-detail', compact('service', 'relatedServices'));
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function portfolioDetail($slug)
    {
        $portfolio = Portfolio::with('images', 'category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedPortfolios = Portfolio::where('portfolio_category_id', $portfolio->portfolio_category_id)->where('id', '!=', $portfolio->id)->where('is_active', true)->take(3)->get();
        return view('pages.portfolio-detail', compact('portfolio', 'relatedPortfolios'));
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function blogDetail($slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->where('status', 'published')->firstOrFail();
        $relatedBlogs = Blog::where('blog_category_id', $blog->blog_category_id)->where('id', '!=', $blog->id)->where('status', 'published')->take(3)->get();
        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
