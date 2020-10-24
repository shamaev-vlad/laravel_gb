@extends ("layouts.main")

@section('title','ajax page')


@section('menu')
    @include('menu')
@endsection
@section('content')
    <div id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1><span id="text">0</span></h1>
                    <button class="btn btn-success" id="toggle">Ajax</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            let buttons = document.querySelectorAll('#toggle');
            buttons.forEach((elem) => {
                elem.addEventListener('click', () => {
                    // let id = elem.getAttribute('data-id');
                    fetch('/toggle', {
                        method: 'POST',
                        headers: {
                            'content-type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                        .then(response => response.json())
                        .then((data) => {
                            document.querySelector('#text').innerHTML = data.text;
                        });
                })
            });
        }
    </script>
@endsection
