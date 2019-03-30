@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
             <div class="card">
                <div class="card-header">Menu</div>
                <nav class="nav flex-column text-right">
                  <a class="nav-link active" href="{{ route('chalets.index') }}">الإستراحات</a>
                  <a class="nav-link" href="{{ route('attributes.index') }}">الخصائص</a>
                  <a class="nav-link" href="{{ route('orders.index') }}">طلبات الحجز الواردة</a>
                </nav>
             </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body text-right">
                    @yield('icontent')                    
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
@endsection
