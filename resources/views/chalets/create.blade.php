@extends('dashboard')
@section('icontent')

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


@if($errors->all())
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </div>
@endif


<form action="{{route('chalets.store')}}" method="post" enctype="multipart/form-data"  id="form1">
@csrf
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="mtab1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"> البيانات الأساسية </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="mtab2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">المواصفات الأساسية </a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="mtab3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">الصور  </a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="mtab4" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">  الأسعار </a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="mtab5" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false"> الخريطة</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="mtab1">
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
  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="mtab2">
      @foreach($attributes as $attribute)
          <div class="form-group">
             <label> {{ $attribute->name }}</label>
                  <input type="text" class="form-control" name="attributes[ {{$attribute->id}} ]"  placeholder="{{ $attribute->description }}" required="">
          </div>
        @endforeach

  </div>
  <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="mtab3">
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
  <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="mtab4">
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
  <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="mtab5">
      <h2>Google Maps Location</h2>
        
             <input type="text" name="map_location" class="form-control" value='' >
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
  
@endsection

