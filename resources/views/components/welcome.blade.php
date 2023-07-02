<div class="p-6 lg:p-8 bg-white border-b border-gray-200 flex justify-center">
    <div class="text-2xl font-medium text-gray-900">
        Welcome to SERV ordering platform!
    </div>
</div>
@isset($products)
    <div class="bg-gray-100 bg-opacity-25 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8 lg:grid-cols-6 xl:grid-cols-4 xl:gap-x-12">
        @foreach($products as $product)
            <a href="#" class="group">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                    <img src="{{ $product->image }}" alt="{{ $product -> name }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $product -> name }}</h3>
                <p class="mt-1 text-sm font-medium text-gray-800">KSH{{ $product -> price }}</p>
                <p class=' text-sm mt-1 font-medium text-gray-800'>{{ $product -> description }}</p>
            </a>
        @endforeach
    </div>
@endisset
