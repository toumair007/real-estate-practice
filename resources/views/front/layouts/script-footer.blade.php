<!-- Main JS File -->
<script src="{{ asset('dist-front/js/main.js') }}"></script>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ $error }}',
                position: 'topRight',
                timeout: 5000,
                progressBarColor: '#ff0000',
                transitionIn: 'fadeInUp',
                transitionOut: 'fadeOutUp'
            });
        </script>
    @endforeach
@endif

@if(session('success'))
    <script>
        iziToast.success({
            title: 'Success',
            message: '{{ session('success') }}',
            position: 'topRight',
            timeout: 5000,
            progressBarColor: '#00ff00'
        });
    </script>
@endif

@if(session('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: '{{ session('error') }}',
            position: 'topRight',
            timeout: 5000,
            progressBarColor: '#ff0000'
        });
    </script>
@endif