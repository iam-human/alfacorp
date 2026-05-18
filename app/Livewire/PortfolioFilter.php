<?php

namespace App\Livewire;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Livewire\Component;

class PortfolioFilter extends Component
{
    public $categories = [];
    public $activeCategory = 'all';

    public function mount()
    {
        $this->categories = PortfolioCategory::all();
    }

    public function setCategory($id)
    {
        $this->activeCategory = $id;
    }

    public function render()
    {
        $query = Portfolio::with('category')->where('is_active', true)->orderBy('sort_order');

        if ($this->activeCategory !== 'all') {
            $query->where('portfolio_category_id', $this->activeCategory);
        }

        $portfolios = $query->get();

        return view('livewire.portfolio-filter', [
            'portfolios' => $portfolios
        ]);
    }
}
