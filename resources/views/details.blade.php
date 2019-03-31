@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $(document).ready(function(){

    const app = new Vue({
                el: "#form1",
                data: {
                  pf: '',
                  pt: '',
                },
                mounted: function() {
                      $(".fdatepicker").datepicker({ dateFormat: 'yy-mm-dd',minDate: new Date(),
                      onSelect: function(date) {
                            var to = new Date($('#pt').val());
                            var from = new Date(date);
                          
                              var timeDiff = Math.abs(to.getTime() - from.getTime());
                              var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                              total_price =  diffDays * 100 ;
                              $("#total").val(total_price);
                        }, 
                      });
                      $(".tdatepicker").datepicker({ dateFormat: 'yy-mm-dd',minDate: new Date(),
                      onSelect: function(date) {
                            var from = new Date($('#pf').val());
                            var to = new Date(date);
                          
                              var timeDiff = to.getTime() - from.getTime();
                              var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                              total_price =  diffDays * 100 ;
                              $("#total").val(total_price);
                        }, 
                      });
                      
                },
                    
            });

  });
  
   

</script>
<div class="container">
  @if(Session::has('message'))
      <p class="alert alert-danger text-right">{{ Session::get('message') }}</p>
    @endif
  <div class="row justify-content-center text-right">
        <div class="col-md-6">
          <h2 class="featurette-heading">{{ $chalet->title }}. </h2>
          <p class="lead">{{ $chalet->description }}</p>
                    <label for="inputAddress">العناون  : </label><br/>
                    {{ $chalet->address }}
                      <label for="inputDistrict">الحي</label><br/>
                        {{ $chalet->district_id }}
                    @foreach($chalet->attributes as $attribute)
                       <br/><label> {{ $attribute->name }}</label>
                      {{ $attribute->description  }} : {{ $attribute->pivot->value }}  
                  @endforeach
        </div>
        <div class="col-md-6">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">

                        @foreach($chalet->media as $media)
                          <div class="carousel-item active">
                            <img src="{{ asset('/') }}{{ $media->path }}/{{ $media->filename }}"  class="d-block w-100 " height="500" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>{{ $media->title }}</h5>
                              <p>{{ $media->description }}</p>
                            </div>
                          </div>
                        @endforeach
                        
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>


        </div>
      </div>
  <hr class="featurette-divider">


  @foreach($chalet->prices as $price)
    <div class="row" >
        <div class="col-md-4">
            <label for="inputFrom"> من :  </label>
            {{ date('d/m/Y', strtotime($price->period_from))  }}
        </div>
        <div class="col-md-4">
            <label for="inputTo">إلى : </label>
            {{ date('d/m/Y', strtotime($price->period_to))  }}
        </div>
        <div class="col-md-2">
          <label for="inputPrice"> سعر اليوم</label>
            {{ $price->day_price }}
        </div>
    </div>
    @endforeach

    <hr>
    <h2 class="text-right">طلب الحجز </h2>
    <form action="{{route('orders.store')}}" method="post"   id="form1">
    @csrf
    <input type="hidden"  name="chalet_id"  value="{{ $chalet->id }} "> 
     <div class="row text-right">
        <div class="col-md-4">
            <label for="inputFrom"> من :  </label>
             <input type="text" class="form-control fdatepicker" name="period_from"  id="pf" required=""> 
        </div>
        <div class="col-md-4">
            <label for="inputTo">إلى : </label>
            <input type="text" class="form-control tdatepicker" name="period_to"  id="pt" required="">
        </div>
        <div class="col-md-2">
            <label for="inputTo">السعر الكلي : </label>
            <input type="text" class="form-control" name="total_price" readonly="" value=""  id="total" >
        </div>
        <div class="col-md-2">
           <br/>
            <input type="submit" class="btn btn-danger" name="btnSubmit" value="طلب الحجز">
        </div>
    </div>
  </form>
</div>

  
@endsection

