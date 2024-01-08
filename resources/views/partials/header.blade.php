<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="py-3">
                <img src="{{ Vite::asset('public/images/dc-logo.png') }}" alt="DC logo">
            </div>
            <div class="my-div">
                <ul class="d-flex justify-content-between">
                    <li class="{{ Route::currentRouteName() == 'home' ? 'selected-page' : '' }}">
                        <a href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'comics' ? 'selected-page' : '' }}">
                        <a href="{{ route('comics.index') }}">COMICS</a>
                    </li>
                    <li>MOVIES</li>
                    <li>TV</li>
                    <li>GAMES</li>
                    <li>COLLECTIBLES</li>
                    <li>VIDEO</li>
                    <li>FANS</li>
                    <li>NEWS</li>
                    <li>SHOP</li>
                </ul>
            </div>
        </div>
    </div>
</header>
