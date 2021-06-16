</div>
</div>
<hr/>
<!-- Footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    @php
                        $socials=['facebook','twitter','github','linkedin','youtube','instagram'];
                    @endphp
                    @foreach($socials as $social)
                        @if($config->$social!=null)
                            <li class="list-inline-item">
                                <a target="_blank" href="{{$config->$social}}">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-{{$social}} fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <p class="copyright text-muted">Copyright &copy; {{date('Y')}} - {{$config->title}}</p>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('front')}}/js/scripts.js"></script>
</body>
</html>

