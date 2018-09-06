<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/ajaxSetup.js') }}"></script>
@auth
    <script src="{{ asset('js/client/chat.js') }}"></script>
    <channel class="d-none">{{ Auth::user()->id }}</channel>
    <script src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
    <script src="{{ asset('js/client/notifications.js') }}"></script>
    <script src="{{ asset('js/client/comment-push.js') }}"></script>
@endauth
<script src="{{ asset('bower_components/sweetalert2/dist/sweetalert2.all.js') }}"></script>
@include('sweetalert::alert')
