@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listorder')}}</h4>
                    <form class="form-inline float-left">
                
                        <div class="form-group mx-sm-3 mb-2">
                         
                          <input type="text" class="form-control" id="SearchRow" placeholder="...">
                        </div>
                        <button type="submit" class="btn btn-info mb-2">{{__('search')}}</button>
                      </form>
                       
                      <a href="#" class="btn btn-sm btn-warning float-right">{{__('addnew')}}</a>
                      <div class="form-group float-right mr-4">     
                        <select class="form-control" id="orderItem">
                          <option>Mới nhất</option>
                          <option>Cũ nhất</option>
                        </select>
                      </div>
                    </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th scope="col" width="60">#</th>
                            <th scope="col">{{__('name')}} {{__('user')}}</th>
                            <th scope="col">{{__('address')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col">{{__('datepurchase')}}</th>
                            <th scope="col">{{__('deliverydate')}}</th>
                            <th scope="col">{{__('totally')}}</th>
                            <th scope="col" width="129">{{__('Action')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                      <tr>
                          <td><input type="checkbox"></td>  
                          <td><p>Anh Nguyen</p></td>
                          <td><p>ViVa Star Coffee Cầu Xéo, Cầu Xéo, P, Tân Phú, Thành phố Hồ Chí Minh, Việt Nam</p></td>
                          <td>anh@gmail.com</td>
                          <td>
                            0298437843
                          </td>
                          <td>
                            Chưa giao hàng
                          </td>
                          <td>16/10/2020</td>
                          <td>17/10/2020</td>
                          <td>983.478</td>
                          <td style="display: flex;justify-content: space-between">
                            <a href="" class="btn btn-sm btn-primary">{{__('edit')}}</a>
                            <form action="#"  method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-danger deleteItem">{{__('delete')}}</button>
                                      </form>
                          </td>
                      </tr>
                           
                        </tbody>
                    </table>
                    <div class="action mt-3">
                        <input type="checkbox" id="selectAllRow">
                        <label for="selectAllRow">{{__('selectall')}}</label>
    
                        <form class="float-right" action="">
                          <input type="hidden">
                          <button class="btn btn-sm btn-danger" type="submit">{{__('deleteselec')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

