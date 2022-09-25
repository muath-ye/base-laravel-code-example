<blockquote {{ $attributes->merge(['class' => 'px-6']) }}>
    <p class="relative px-10 text-2xl text-center text-gray-700 md:px-16 md:text-3xl">
        <span class="absolute top-0 left-0 -mt-4 text-6xl text-gray-300 md:-mt-6 md:text-7xl">&ldquo;</span>
        {{ $slot }}
        <span class="absolute top-0 right-0 -mt-4 text-6xl text-gray-300 md:-mt-6 md:text-7xl">&rdquo;</span>
    </p>

    <footer class="flex items-center justify-end px-12 mt-10">
        <img src="{{ asset('images/avatar-' . $handle . '.jpg') }}" alt="{{ $name }}" class="w-16 h-16 rounded-full md:w-20 md:h-20">
        <cite class="ml-2 text-lg font-display md:text-xl">
            <a href="https://twitter.com/{{ $handle }}" class="italic text-shift-red hover:text-red-600 focus:text-red-600 hover:underline focus:underline">{{ $name }}</a><br>
            <span class="not-italic text-gray-600">{{ $title }}</span>
        </cite>
    </footer>
</blockquote>