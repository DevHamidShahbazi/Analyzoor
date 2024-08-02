@extends('layouts.layout admin.index')

@section('setting','active')

@section('content')

    <textarea dir="ltr" class="col-12" name="test" id="test" cols="30" rows="10">
        <?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <url>
            <loc>
            https://fanoram.ir
            </loc>
            <lastmod>
            2024-07-26T00:27:01+03:30
            </lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            </url>
         @foreach($parentCategory as $item )
            <url>
            <loc>
            https://fanoram.ir/parent/article/category/{{$item->slug}}
            </loc>
            <lastmod>
            {{$item->updated_at->toAtomString()}}
            </lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            </url>
        @endforeach

        @foreach($childCategory as $item )
            <url>
            <loc>
            https://fanoram.ir/child/article/category/{{$item->slug}}
            </loc>
            <lastmod>
            {{$item->updated_at->toAtomString()}}
            </lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            </url>
        @endforeach

        @foreach($article as $item )
            <url>
            <loc>
            https://fanoram.ir/article/detail/{{$item->slug}}
            </loc>
            <lastmod>
            {{$item->updated_at->toAtomString()}}
            </lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            </url>
        @endforeach

        </urlset>
    </textarea>

@endsection


