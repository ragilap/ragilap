@extends('layouts.checkout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a onclick="removeShippingCost(event, '/')" style="cursor: pointer">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        function removeShippingCost(event, targetUrl) {
            event.preventDefault();
            axios.post('/cancelCheckout')
                .then((res) => {
                    console.log('Shipping cost removed.');
                    window.location.href = targetUrl;
                })
                .catch((error) => {
                    console.error('Error removing shipping cost:', error);
                });
        }
    </script>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container" id="checkout">
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
