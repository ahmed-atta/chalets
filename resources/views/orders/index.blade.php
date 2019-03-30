@extends('dashboard')
@section('icontent')

  
  <div class="card mt-4">
    <div class="card-body">
      <h2></h2> 
      <h7></h7>
        
  
    </div>
  </div>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاستراحة</th>
      <th scope="col">المدة من </th>
      <th scope="col">إلى </th>
      <th scope="col">صاحب الحجز  </th>
      <th scope="col">التواصل  </th>
       <th scope="col">إجمالي السعر  </th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $k=> $order)
    <tr>
      <th scope="row">{{ $k }}</th>
      <td>{{ $order->chalets->title }}</td>
      <td>{{ date('d/m/Y', strtotime($order->period_from))  }}</td>
      <td>{{ date('d/m/Y', strtotime($order->period_to))  }} </td>
      <td>{{ $order->users->name }}</td>
      <td>{{ $order->users->mobile }} <br/> {{ $order->users->email }}</td>
      <td>{{ $order->total_price }}</td>
      <td><form onsubmit="return confirm('Are you sure you want to confirm this order?')" class="d-inline-block" method="get" action="">       
          <button type="submit" class="btn btn-danger">تأكيد الحجز </button>
        </form></td>
      <td><form onsubmit="return confirm('Are you sure you want to cancel this order?')" class="d-inline-block" method="get" action="">       
          <button type="submit" class="btn btn-danger">إلغاء لحجز </button>
        </form></td>
    </tr>
  @endforeach


  </tbody>
</table>

  <div class="mt-4">
    {{$orders->links()}}
  </div>


@endsection
