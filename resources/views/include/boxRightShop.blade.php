<div class="col-xl-12 col-md-6 col-sm-12">
  <h4 class="pt-4 pb-3 text-capitalize">{{__('client.filterProduct')}}</h4>
  <form action="{{route('shop.filters')}}" method="get">
    <div class="form-group boxSelect">
      <label for="sortby">Sắp xếp theo</label>
      <select class="form-control" name="sortBy" id="sortBy">
        <option value="">Sắp xếp theo</option>
        <option {{old("sortBy") == "desc" ? "selected" : ""}} value="desc">Mới nhất</option>
        <option {{old("sortBy") =="asc" ? "selected" : ""}}  value ="asc" >Cũ nhất</option>
      </select>
    </div>
    <div class="form-group boxSelect">
      <label for="vintage">Năm sản xuất</label>
      <select class="form-control" name="vintage" id="vintage">
        <option value="">Năm sản xuất</option>
        @foreach($vintages as $vintage)
          <option {{old("vintage") == $vintage->vintage ? "selected" : ""}} value="{{$vintage->vintage}}">{{ $vintage->vintage }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group boxSelect">
      <label for="nation">Quốc gia</label>
      <select class="form-control text-capitalize" name="nation">
        <option value="">Quốc gia</option>
        @foreach($nations as $nation)
          <option {{old("nation") == $nation->nation ? "selected" : ""}} value="{{$nation->nation}}">{{ $nation->nation }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group boxSelect">
      <label for="category">Loại rượu</label>
      <select class="form-control text-capitalize" name="category">
        <option value="">Loại rượu</option>
        @foreach($categories as $category)
          <option {{old("category") == $category->slug ? "selected" : ""}} value="{{$category->slug}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group boxSelect">
      <label for="price">Giá tiền</label>
      <select class="form-control" name="price" id="price">
        <option value="">Giá tiền</option>
        <option {{old("price") == "<5" ? "selected" : ""}} value="<5">Dưới 5 triệu</option>
        <option {{old("price") == "5-10" ? "selected" : ""}} value="5-10">5 - 10 triệu</option>
        <option {{old("price") == "10-20" ? "selected" : ""}} value="10-20">10 - 20 triệu</option>
        <option {{old("price") == ">20" ? "selected" : ""}} value=">20">Trên 20 triệu</option>
      </select>
    </div>

    <button type="submit" class="btn btn-dark">{{__('client.filter')}}</button>
  </form>

</div>
