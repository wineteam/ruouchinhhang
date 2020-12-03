@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listpro')}}</h4>
                    <form class="form-inline float-left" method="GET" action="{{route('MngProduct.search')}}">

                      <div class="form-group mx-sm-3 mb-2">

                        <input type="text" class="form-control" id="SearchRow" name="name" placeholder="...">
                      </div>
                      <button type="submit" class="btn btn-info mb-2">{{__('search')}}</button>
                    </form>

                    <a href="{{route('MngProduct.create')}}" class="btn btn-sm btn-warning float-right">{{__('addnew')}}</a>
                    <div class="form-group float-right mr-4">
                      <select class="form-control" id="orderItem" onchange="location = this.value;">
                        <option @if(isset($new)) {{$new}} @endif value="{{route('MngProduct.order','new')}}">{{__('latest')}}</option>
                        <option @if(isset($old)) {{$old}} @endif value="{{route('MngProduct.order','old')}}">{{__('oldest')}}</option>
                      </select>
                    </div>
                </div>

                <div class="card-body">
                    <form  method="POST" id="deleteAllProduct" action="{{route('MngProduct.deleteAll')}}">
                      @csrf
                      @method('delete')
                        <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col" width="60">{{__('image')}}</th>
                                <th scope="col" width="60">{{__('name')}}</th>
                                <th scope="col" width="200">{{__('nation')}}</th>
                                <th scope="col" width="200">{{__('Especially')}}</th>
                                <th scope="col" width="200">{{__('Status')}}</th>
                                <th scope="col" width="200">{{__('Datecreated')}}</th>
                                <th scope="col" width="200">{{__('Language')}}</th>
                                <th scope="col" width="129">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
            
                            @foreach ($products as $product)
                              <tr>
                                <td><input type="checkbox" name='productId[]' value="{{$product->id}}" class="selectAllchilden"></td>
                                <td><img src="{{asset('storage/'.$product->thumbnail) }}" width="60px" alt=""></td>
                                <td><a href="#">{{ $product->name }}</a></td>
                                <td>{{ $product->nation }}</td>
                                <td> @if ($product->especially == 1) Có @else Không @endif</td>
                                <td>  @if ($product->is_published == 1) Đang hiển thị @else KHông hiển thị @endif </td>
                                <td>{{\Carbon\Carbon::parse( $product->created_at)->format('d/m/Y')}}</td>
                                <td> @if ($product->language_id == 1) Tiếng việt @else Tiếng anh @endif</td>

                                <td>
                                  <div style="display: flex;justify-content: space-between">
                                    <a href="{{route('MngProduct.edit',$product->id)}}" class="btn btn-sm btn-primary">{{__('edit')}}</a>
                                    <a href="{{route('shop.show',$product->slug)}}" class="btn btn-sm btn-warning">{{__('show')}}</a>
                                    <form form="deleteProduct" action="{{route('MngProduct.destroy',$product->id)}}" method="post">
                                      @csrf
                                      @method('delete')
                                      <button form="deleteProduct" type="button" class="btn btn-sm btn-danger deleteItem">{{__('delete')}}</button>
                                    </form>
                                  </div>
                                </td>
                            </tr>  
                            @endforeach
                          
                        </tbody>
                        </table>
                    </form>
                    <div class="action mt-3">
                      <input type="checkbox" id="selectAllRow">
                      <label for="selectAllRow">{{__('selectall')}}</label>
                      <button style="float: right; display:none" class="btn btn-sm btn-danger sheetDelete" form="deleteAllProduct" type="submit">{{__('deleteselec')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="display: flex">
      {{$products->links()}}
    </div>
    </section>
  </section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
      $('.deleteItem').click(function (e) {
      e.preventDefault();
      var formname = $(this).parent();
      const confirmDelete = confirm("Bạn chắc chắn xóa chứ ?");
      if(confirmDelete == true){
        formname.submit();
        return true;
      }
      return false;
    });

      $('#selectAllRow').on('click', function(e) {
        if($(this).is(':checked',true))
        {
          $(".selectAllchilden").prop('checked', true);
          $(".sheetDelete").css("display", "block");;
        } else {
          $(".selectAllchilden").prop('checked',false);
          $(".sheetDelete").css("display", "none");;
        }
      });

      $('.selectAllchilden').on('click', function(e) {
        if($(this).is(':checked',true))
        {
          $(".sheetDelete").css("display", "block");;
        } else {
          $(".sheetDelete").css("display", "none");;
        }
      });

    });


</script>
@endsection