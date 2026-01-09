@props(['slides', 'autoPlay' => true])

<div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
    "isAutoPlay": {{ $autoPlay ? 'true' : 'false' }}
}' class="relative">

    <div class="hs-carousel relative overflow-hidden w-full min-h-96 bg-white rounded-lg">
        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
            @foreach ($slides as $slide)
                <x-carousel.slide
                    :image="asset('storage/' . $slide['img'])"
                    :title="$slide['title']"
                    :text="$slide['text']"
                />
            @endforeach
        </div>
    </div>

    <!-- Prev / Next -->
    <button type="button" class="hs-carousel-prev ...">…</button>
    <button type="button" class="hs-carousel-next ...">…</button>

    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 gap-x-2"></div>
</div>