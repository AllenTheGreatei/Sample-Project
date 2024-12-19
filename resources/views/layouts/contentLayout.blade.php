@extends('layouts/commonMaster' )

@section('layoutContent')
<div class="layout_wrapper">
    <div class="layout_container">

        <!-- Layout Page -->
        <div class="layout_page">
            <div class="container">
                <div class="content_wrapper">

                    @yield('content')
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection