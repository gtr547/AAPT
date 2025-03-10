<!-- <nav class="bg-yellow-300 shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-evenly items-center h-16">
            <div class="flex space-x-8">
                @foreach($navigationItems as $item)
                    <a href="{{ $item['url'] }}" 
                       class="text-gray-700 hover:text-blue-600">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav> -->

<nav class="shadow-sm" style="background-color: #ef8321;">
    <div class="max-w-7xl mx-auto px-4">
        <div class="relative">
            <div class="flex justify-evenly items-center h-16">
                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:space-x-8 md:w-full md:justify-evenly">
                    @foreach($navigationItems as $item)
                        <a href="{{ $item['url'] }}"
                           class="text-gray-800 hover:bg-white px-5 py-3 ">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <!-- Mobile Menu Toggle -->
                <label for="mobile-menu" class="md:hidden cursor-pointer w-full text-left">
                    <svg class="h-6 w-6 text-gray-700 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </label>
            </div>

            <!-- Hidden checkbox for toggle -->
            <input type="checkbox" id="mobile-menu" class="hidden">

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu-content" class="hidden md:hidden absolute w-full left-0 bg-yellow-300 shadow-lg">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    @foreach($navigationItems as $item)
                        <a href="{{ $item['url'] }}"
                           class="block px-3 py-2 text-center text-gray-700 hover:text-blue-600 hover:bg-yellow-400">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // JavaScript to toggle mobile menu visibility
    document.getElementById('mobile-menu').addEventListener('change', function() {
        var mobileMenuContent = document.getElementById('mobile-menu-content');
        if (this.checked) {
            mobileMenuContent.classList.remove('hidden');
        } else {
            mobileMenuContent.classList.add('hidden');
        }
    });
</script>