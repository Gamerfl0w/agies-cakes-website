<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agies Cakes</title>
    <script defer src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ URL::asset('photo/agies-logo.jpg') }}" type="image/x-icon"/>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('external-css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
    
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"> 

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #be185d;">   
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="d-flex">
                        <div><img class="rounded-full" src="{{ asset('photo/agies-logo.jpg') }}" style="height:50px;" alt=""></div>
                        <div class="pl-3 pt-2" style="font-size:1.5rem;">Agies Cakes</div>
                    </div>
                </a>
            </div>
        </nav>


        <main class="py-4">
            <div class="h-full">
                <div class="row mx-auto">
                    <div class="col-12 col-md-12 col-lg-2 col-md-2 col-sm-12 pb-2">
                        <div class="card">
                            <div class="card-header">
                                NAVIGATION
                            </div>
                            <ul class="list-group">
                                <a href="{{ route('admin.index') }}" class="list-group-item admin-navigation">
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.user') }}" class="list-group-item admin-navigation">
                                        Users
                                </a>
                                <a href="{{ route('admin.product') }}" class="list-group-item admin-navigation">
                                        Products
                                </a>
                                <a href="{{ route('admin.order') }}" class="list-group-item admin-navigation">
                                        Orders
                                </a>
                            </ul>
                        </div>
                        
                    </div>
                    
                    @yield('content')
                </div>
            </div>
            
        </main>

    </div>


</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@yield('script')
<script>

function product_size()
        {
            var id =JSON.stringify($('#product-list').val());
            
            $.ajax({
                url:"{{ route('admin.stockshow') }}",
                method:'GET',
                data:{
                         id:id,
                    },
                dataType:'json',
                success:function(data)
                {
                    $('#stock-list').html(data.table_data);
                }
            })
        }

        $(document).on('change','#product-list',function(){
            product_size();
        });
    
</script>

</html>

