@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script type="text/javascript">
  window.onload = function () {
        
   
        const app = new Vue({
            el: "#form1",
            data: {
                rows: [],
                images: []
            },
            mounted: function() {
                  $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
                    //var self = this;
                    //$('.datepicker').datepicker({
                     // onSelect:function(selectedDate, datePicker) {            
                          //self.date = selectedDate;
                     // }
                    //});
                },
            methods: {
                addRow: function() {
                    var elem = document.createElement('div');
                    this.rows.push({
                        from: "",
                        to: "",
                        price: "",
                    });
                },
                addImage: function() {
                    var elem = document.createElement('div');
                    this.images.push({
                        title: "",
                        description: "",
                        file: "",
                    });
                },
                removeElement: function(index) {
                    this.rows.splice(index, 1);
                },
            }
        });


  }

 
</script>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8"  >


  @if($errors->all())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </div>
                  @endif


<form action="{{route('chalets.store')}}" method="post" enctype="multipart/form-data"  id="form1">
@csrf

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header btn" id="headingOne" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
      <h2 class="mb-0">
          البيانات الأساسية 
      </h2>
    </div>

    <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">اسم الإستراحة </label>
                    <input type="text" class="form-control" id="title" name ="title" placeholder="اسم الاستراحة" required >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">وصف مختصر </label>
                  <textarea class="form-control" name="description" id="inputAddress"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputAddress">العنوان  </label>
                  <input type="text" class="form-control" name="address" id="Address" placeholder="1234 الشراع St - الحي"  required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">المدينة </label>
                    <select class="form-control" id="inputCity"  required>
                      <option selected>Choose...</option>
                      <option>الرياض  </option>
                      <option> مكه المكرمه </option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputDistrict">الحي</label>
                    <select id="inputDistrict" class="form-control" name="district_id"  required>
                      <option selected>Choose...</option>
                      <option value="1">العزيزية</option>
                      <option value="2">الروضة</option>
                    </select>
                  </div>
                </div>
                 
               
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header btn collapsed" id="heading2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
      <h2 class="mb-0">
          المواصفات الأساسية 
      </h2>
    </div>
    <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($attributes as $attribute)
          <div class="form-group">
             <label> {{ $attribute->name }}</label>
                  <input type="text" class="form-control" name="attributes[ {{$attribute->id}} ]"  placeholder="{{ $attribute->description }}">
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header btn collapsed"  id="heading3"  data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
      <h2 class="mb-0">
          الصور 
      </h2>
    </div>
    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
      <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFrom">عنوان الصورة </label>
              <input type="text" class="form-control " name="images_titles[]">
            </div>
            <div class="form-group col-md-4">
                  <label for="inputAddress">رفع الملف </label>
                    <input type='file' id="image" name="images_files[]" accept=".png, .jpg, .jpeg"  />
            </div>
        </div>
        <div class="form-group">
                  <label for="inputPrice"> وصف الصورة</label>
              <textarea class="form-control " name="images_descriptions[]"></textarea>
        </div>

         <hr/>
        <div   v-for="(image, index) in images">
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFrom">عنوان الصورة </label>
              <input type="text" class="form-control " name="images_titles[]">
            </div>
            <div class="form-group col-md-4">
                  <label for="inputAddress">رفع الملف </label>
                    <input type='file' id="image" name="images_files[]" accept=".png, .jpg, .jpeg"  />
            </div>
        </div>
          <div class="form-group">
                  <label for="inputPrice"> وصف الصورة</label>
              <textarea class="form-control " name="images_descriptions[]"></textarea>
            </div>
            <hr/>
          </div>
          <div class="form-group">
              <button type="button" class="btn btn-success btn-sm" @click="addImage">إضافة صورة جديدة</button>
          </div> 


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
          
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFrom">الفترة من </label>
              <input type="text" class="form-control datepicker" name="period_from[]">
            </div>
            <div class="form-group col-md-4">
              <label for="inputTo">إلى</label>
               <input type="text" class="form-control datepicker" name="period_to[]">
            </div>
            <div class="form-group col-md-2">
              <label for="inputPrice"> سعر اليوم</label>
              <input type="text" class="form-control " name="day_price[]">
            </div>
            
        </div>
        <div class="form-row"  v-for="(row, index) in rows">
            <div class="form-group col-md-4">
              <label for="inputFrom">الفترة من </label>
              <input type="text" class="form-control datepicker" name="period_from[]">
            </div>
            <div class="form-group col-md-4">
              <label for="inputTo">إلى</label>
               <input type="text" class="form-control datepicker" name="period_to[]">
            </div>
            <div class="form-group col-md-2">
              <label for="inputPrice"> سعر اليوم</label>
              <input type="text" class="form-control " name="day_price[]">
            </div>
            <div class="form-group col-md-2">
              <a v-on:click="removeElement(index);" style="cursor: pointer" class="btn btn-danger btn-sm">Remove</a>
            </div>
        </div>

          <div class="form-group col-md-2">
              <button type="button" class="btn btn-success btn-sm" @click="addRow">إضافة فتره جديده</button>
          </div>
        
       
      </div>
    </div>
</div>
<div class="card">
    <div class="card-header btn  collapsed" id="heading5" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
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

<br/>
 <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
  </div>
 
</form>





    </div>
  </div>
</div>
  
@endsection

