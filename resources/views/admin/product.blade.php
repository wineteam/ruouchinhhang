@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listpro')}}</h4>
                    <form class="form-inline float-left">
                  
                      <div class="form-group mx-sm-3 mb-2">
                       
                        <input type="text" class="form-control" id="SearchRow" placeholder="...">
                      </div>
                      <button type="submit" class="btn btn-info mb-2">{{__('search')}}</button>
                    </form>
                     
                    <a href="#" class="btn btn-sm btn-warning float-right">{{__("addnew")}}</a>
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
        
                <tr>
                    <td><input type="checkbox"></td>
                    <td><img src="./img/058053-alt1.jpg" width="60px" alt=""></td>
                    <td><a href="#">Wine name</a></td>
                    <td>America</td>
                    <td>
                       Có
                    </td>
                    <td>
                      Đang hiển thị
                    </td>
                    <td>16/10/2020</td>
                    <td>Việt Nam</td>

                    <td>
                      <div style="display: flex;justify-content: space-between">
                        <a href="" class="btn btn-sm btn-primary">{{__('edit')}}</a>
                        <a href="" class="btn btn-sm btn-warning">{{__('show')}}</a>
                        <form action="#"  method="post">
                          @csrf
                          @method('delete')
                          <button type="button" class="btn btn-sm btn-danger deleteItem">{{__('delete')}}</button>
                        </form>
                      </div>
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
    $('.deleteItem').click(function (e) {
      e.preventDefault();
      var formname = $(this).parent();
      const confirmDelete = confirm("ban muon xoa nguoi dung nay");
      if(confirmDelete == true){
        formname.submit();
        return true;
      }
      return false;
    });
  </script>
@endsection