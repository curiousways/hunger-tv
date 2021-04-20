<!doctype html>
<html @php language_attributes() @endphp>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="holder">
      <div class="wrap container-main" role="document">
        <div class="content">
          <main class="main">
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          @endif
        </div>
      </div>
  </div>
    <div id="fixed-slice"></div>
    <div id="fixed-slice-2"></div>
    <div id="fixed-slice-3"></div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
    <script type="text/javascript">
(function() { var s = document.createElement("script"); s.type = "text/javascript"; s.async = true; s.src = '//api.usersnap.com/load/e92c09d1-3f22-4fa8-a136-52463c01b815.js';
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); })();
</script>
<script type=“text/javascript” class=“teads” src=“//a.teads.tv/page/81832/tag” async=“true”></script>
  </body>
</html>
