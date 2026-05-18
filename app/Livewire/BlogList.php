<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

    public $search = '';
    public $category_slug = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'category_slug' => ['except' => null],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setCategory($slug)
    {
        $this->category_slug = $slug;
        $this->resetPage();
    }

    public function render()
    {
        $query = Blog::with('category')->where('status', 'published');

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->category_slug) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->category_slug);
            });
        }

        return view('livewire.blog-list', [
            'blogs' => $query->latest('published_at')->paginate(6),
            'categories' => BlogCategory::all(),
            'recentPosts' => Blog::where('status', 'published')->latest('published_at')->take(5)->get(),
        ]);
    }
}
