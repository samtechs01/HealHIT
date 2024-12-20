<div class="mb-[80px]">
    <div class="pt-[80px] justify-self-center">
        <x-page-heading class="justify-self-center" textA="Published Products"/>
        <div class="grid pt-[40px] md:grid-flow-row md:grid-cols-3 gap-8">
            @forelse ( $publishedProducts as $product )
            <div wire:key="product-{{$product->id}}" x-intersect="$el.classList.add('animate-fadeIn')">
                <a href="/product/project-blog/{{$product->id}}">
                    <x-service-card title="{{$product->title}}" img_src="{{$product->product_src}}" type="{{$product->product_category}}"/>
                </a>
            </div>
            @empty
            <div></div>
            <div class="justify-self-center">
                Coming soon!!
            </div>
            <div></div>
            @endforelse
        </div>
    </div>

    <div class="pt-[80px] justify-self-center w-full">
        <x-page-heading class="justify-self-center" textA="Projects In-Progress"/>
        <div class="grid pt-[40px] md:grid-flow-row md:grid-cols-3 gap-8">
            @forelse ( $draftProducts as $product )
            <div wire:key="product-{{$product->id}}" x-intersect="$el.classList.add('animate-fadeIn')">
                <a href="/product/project-blog/{{$product->id}}">
                    <x-service-card title="{{$product->title}}" img_src="{{$product->product_src}}" type="{{$product->product_category}}"/>
                </a>
            </div>
            @empty
                <div></div>
                <div class="text-center">Coming soon!!</div>
                <div></div>
            @endforelse
        </div>
    </div>


</div>
 