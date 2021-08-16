<section class="hero is-primary is-small">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <header class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            {{-- <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo"> --}}
            Money view book
          </a>
          <span class="navbar-burger" data-target="navbarMenuHeroC">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>

        @include('layouts.main-nav')
      </div>
    </header>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <p class="title" v-text="$route.meta.title"></p>
      <p class="subtitle" v-text="$route.meta.subTitle"></p>
    </div>
  </div>

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    @include('layouts.nav')
  </div>
</section>