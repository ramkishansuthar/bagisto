<x-shop::layouts>
    {{-- Hero Section --}}
	<div class="bs-hero-section">
		<picture>
			<img alt="" src="{{ bagisto_asset('images/hero-image.webp') }}" />
		</picture>

		<div class="">
			<a
                href="javascript:void(0);"
                class="block text-[22px] py-[20px] font-medium text-center bg-[#E8EDFE] font-dmserif"
            >
                {{-- @translations --}}
                @lang('Get UPTO 40% OFF on your 1st order SHOP NOW')
            </a>
		</div>
	</div>

    {{-- Carousel --}}
	<x-shop::products.carousel
        title="Men's Collections"
        :src="route('shop.products.index')"
        :navigation-link="route('shop.home.index')"
    >
    </x-shop::products.carousel>
</x-shop::layouts>
