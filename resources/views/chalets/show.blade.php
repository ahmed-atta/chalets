@extends('dashboard')
@section('icontent')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8"  >


<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header btn" id="heading1" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
      <h2 class="mb-0">
          البيانات الأساسية 
      </h2>
    </div>

    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
      <div class="card-body">
      
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">اسم الإستراحة : </label>
                    {{ $chalet->title }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">وصف مختصر : </label>
                  {{ $chalet->description }}
                </div>
                <div class="form-group">
                  <label for="inputAddress">العناون  : </label>
                  {{ $chalet->address }}
                </div>
                  <div class="form-group col-md-4">
                    <label for="inputDistrict">الحي</label>
                      {{ $chalet->district_id }}
                  </div>
                </div>
                 
               
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header btn collapsed" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
      <h2 class="mb-0">
          مواصفات الإستراحة 
      </h2>
    </div>
    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($chalet->attributes as $attribute)
          <div class="form-group">
             <label> {{ $attribute->name }}</label> <br/>
                  {{ $attribute->description  }} : {{ $attribute->pivot->value }}  
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header btn collapsed" id="heading3" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
      <h2 class="mb-0">
          الصور 
      </h2>
    </div>
    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
      <div class="card-body">

         @foreach($chalet->media as $media)
        <div class="form-row">
            <div class="form-group col-md-4">
             {{ $media->title }}
            </div>
            <div class="form-group col-md-4">
                 <img src="{{ asset('/') }}{{ $media->path }}/{{ $media->filename }}"  width="300" weight="300"/>
            </div>
        </div>
        <div class="form-group">
                 {{ $media->description }}
        </div>
        @endforeach



      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header btn collapsed" id="heading4" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
      <h2 class="mb-0">
          الأسعار 
      </h2>
    </div>
    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
      <div class="card-body">
          
          @foreach($chalet->prices as $price)
           
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFrom"> من :  </label>
              {{ $price->period_from }}
            </div>
            <div class="form-group col-md-4">
              <label for="inputTo">إلى : </label>
               {{ $price->period_to }}
            </div>
            <div class="form-group col-md-2">
              <label for="inputPrice"> سعر اليوم</label>
              {{ $price->day_price }}
            </div>
        </div>
        @endforeach


      </div>
    </div>
</div>
<div class="card">
    <div class="card-header btn collapsed" id="heading5" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
      <h2 class="mb-0">
          الخريطة 
      </h2>
    </div>
    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
      <div class="card-body">
            
  
         <!--our form-->
        <h2>Google Maps Location</h2>
        
             <input type="text" name="map_location" class="form-control" value='' >
      </div>
    </div>
  </div>
</div>

 






    </div>
  </div>
</div>
  
@endsection

