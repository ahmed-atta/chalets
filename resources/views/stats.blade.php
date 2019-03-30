@extends('dashboard')
@section('icontent')
  <h3>إحصائيات </h3>
  
  <div class="card mt-4">
    <div class="card-body">
      <h5> عدد الاستراحات المسجلة بحسابك   : {{ $chalets_count }}</h5> 
     <h5> عدد الطلبات الورادة    : {{ $orders_count }}</h5> 
        
        
      </div>
    </div>
  
 

@endsection
