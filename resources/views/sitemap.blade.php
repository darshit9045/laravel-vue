<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    @foreach ($pages as $page)
        <url>
            <loc>{{ route('page.view', $page->slug) }}</loc>
            <lastmod>{{ ($page->updated_at)?$page->updated_at->tz('UTC')->toAtomString():$page->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>{{ route('blog.detail', $post->slug) }}</loc>
            <lastmod>{{ ($post->updated_at)?$post->updated_at->tz('UTC')->toAtomString():$post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
