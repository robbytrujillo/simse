<footer class="footer footer-static footer-light navbar-border navbar-shadow">
  <div class="clearfix px-2 mb-0 blue-grey lighten-2 text-sm-center">
    <span class="float-md-left d-block d-md-inline-block">
      @if ($config && $config->text_footer)
      {{ $config->text_footer }}
      @else
      FOOTER
      @endif
    </span>
  </div>
</footer>
