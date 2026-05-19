<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Hero;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;
use App\Models\Partner;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'password' => bcrypt('password'),
        ]);

        // Hero
        Hero::create([
            'headline' => 'Solusi Digital Terbaik untuk Bisnis Anda',
            'subheadline' => 'Kami membantu mentransformasi bisnis Anda dengan teknologi terkini dan desain yang memukau.',
            'cta_primary_text' => 'Hubungi Kami',
            'cta_primary_url' => '/kontak',
            'cta_secondary_text' => 'Lihat Portfolio',
            'cta_secondary_url' => '/portfolio',
            'stat_1_number' => '340+',
            'stat_1_label' => 'Proyek Selesai',
            'stat_2_number' => '150+',
            'stat_2_label' => 'Klien Puas',
            'stat_3_number' => '12+',
            'stat_3_label' => 'Tahun Pengalaman',
            'is_active' => true,
        ]);

        // Services
        $services = [
            ['title' => 'Pengembangan Web', 'icon' => 'heroicon-o-computer-desktop', 'is_featured' => true],
            ['title' => 'Aplikasi Mobile', 'icon' => 'heroicon-o-device-phone-mobile', 'is_featured' => true],
            ['title' => 'Desain UI/UX', 'icon' => 'heroicon-o-paint-brush', 'is_featured' => true],
            ['title' => 'Digital Marketing', 'icon' => 'heroicon-o-megaphone', 'is_featured' => false],
            ['title' => 'Konsultasi IT', 'icon' => 'heroicon-o-light-bulb', 'is_featured' => false],
            ['title' => 'Keamanan Siber', 'icon' => 'heroicon-o-shield-check', 'is_featured' => false],
        ];

        foreach ($services as $index => $srv) {
            Service::create([
                'title' => $srv['title'],
                'slug' => Str::slug($srv['title']),
                'short_description' => 'Layanan ' . strtolower($srv['title']) . ' profesional untuk mendukung pertumbuhan bisnis Anda di era digital.',
                'full_description' => '<p>Deskripsi lengkap mengenai layanan ' . $srv['title'] . '. Kami memberikan solusi terbaik dan inovatif yang dirancang khusus untuk memenuhi kebutuhan bisnis Anda.</p>',
                'icon' => $srv['icon'],
                'is_featured' => $srv['is_featured'],
                'is_active' => true,
                'sort_order' => $index,
            ]);
        }

        // Portfolio Categories
        $categories = ['Web', 'Mobile', 'Branding', 'Konsultasi'];
        foreach ($categories as $cat) {
            PortfolioCategory::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }

        // Portfolios
        $portfolioCategories = PortfolioCategory::all();
        for ($i = 1; $i <= 8; $i++) {
            $cat = $portfolioCategories->random();
            Portfolio::create([
                'portfolio_category_id' => $cat->id,
                'title' => 'Proyek ' . $cat->name . ' ' . $i,
                'slug' => Str::slug('Proyek ' . $cat->name . ' ' . $i),
                'short_description' => 'Aplikasi ' . strtolower($cat->name) . ' inovatif untuk perusahaan terkemuka.',
                'full_description' => '<p>Detail proyek pengembangan ' . strtolower($cat->name) . ' yang sukses meningkatkan efisiensi klien hingga 40%.</p>',
                'client_name' => 'PT Klien Sukses ' . $i,
                'project_date' => now()->subMonths(rand(1, 12)),
                'is_featured' => $i <= 3,
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }

        // Teams
        $positions = ['CEO & Founder', 'CTO', 'Lead Designer', 'Senior Developer', 'Marketing Manager'];
        foreach ($positions as $index => $pos) {
            Team::create([
                'name' => 'Anggota Tim ' . ($index + 1),
                'position' => $pos,
                'bio' => 'Berpengalaman lebih dari 5 tahun di bidangnya dan selalu bersemangat menciptakan inovasi baru.',
                'instagram_url' => 'https://instagram.com/alfacorp',
                'linkedin_url' => 'https://linkedin.com/company/alfacorp',
                'email' => 'tim' . ($index + 1) . '@alfacorp.com',
                'phone' => '628123456789' . $index,
                'is_active' => true,
                'sort_order' => $index,
            ]);
        }

        // Testimonials
        for ($i = 1; $i <= 4; $i++) {
            Testimonial::create([
                'client_name' => 'Klien Bahagia ' . $i,
                'client_position' => 'Direktur',
                'client_company' => 'PT Maju Bersama',
                'content' => 'Pelayanan yang sangat luar biasa! Hasil kerja sesuai dengan ekspektasi dan sangat profesional. Sangat direkomendasikan.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => $i,
            ]);
        }

        // Blog Categories
        $blogCats = ['Teknologi', 'Bisnis', 'Tips & Trik'];
        foreach ($blogCats as $cat) {
            BlogCategory::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }

        // Blogs
        $bCategories = BlogCategory::all();
        for ($i = 1; $i <= 6; $i++) {
            $cat = $bCategories->random();
            Blog::create([
                'blog_category_id' => $cat->id,
                'title' => 'Artikel Menarik tentang ' . $cat->name . ' ' . $i,
                'slug' => Str::slug('Artikel Menarik tentang ' . $cat->name . ' ' . $i),
                'excerpt' => 'Ini adalah kutipan singkat dari artikel yang membahas tren terbaru di industri.',
                'content' => '<p>Konten artikel lengkap mengenai topik ini. Di sini kita membahas berbagai strategi dan insight yang bermanfaat bagi pembaca.</p>',
                'author_name' => 'Admin Penulis',
                'status' => 'published',
                'published_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        // Inquiries
        for ($i = 1; $i <= 3; $i++) {
            Inquiry::create([
                'name' => 'Calon Klien ' . $i,
                'email' => 'calon'.$i.'@example.com',
                'phone' => '08123456789' . $i,
                'subject' => 'Tanya Layanan',
                'message' => 'Halo, saya tertarik dengan layanan yang Anda tawarkan. Mohon informasi lebih lanjut.',
                'status' => 'new',
            ]);
        }

        // Partners / Clients
        $mockPartners = ['Fextol', 'Almobeo', 'NetSheet', 'Revolve', 'Refert'];
        foreach ($mockPartners as $name) {
            Partner::firstOrCreate([
                'name' => $name,
            ], [
                'logo' => 'partners/' . strtolower($name) . '.svg',
            ]);
        }
    }
}
