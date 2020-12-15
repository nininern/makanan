<div class="links">
    <a href="/">Home</a>
    <a href="/daftarmakanan">Daftar Makanan</a>
    <a href="/about">About</a>
    <a href="/help">Help</a>
    @if (Auth::check() && Auth::user()->level == 'admin')
    <a href="/makanan">Makanan</a>
    @endif

</div>