@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listorder')}} {{__('details')}}</h4>
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
                            <th scope="col">{{__('procode')}}</th>
                            <th scope="col">{{__('proname')}}</th>
                            <th scope="col">{{__('price')}}</th>
                            <th scope="col">{{__('quantity')}}</th>
                            <th scope="col">{{__('Datecreated')}}</th>
                            <th scope="col" width="129">{{__('Action')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                      <tr>
                          <td><input type="checkbox"></td>  
                          <td><p>31231ASS</p></td>
                          <td><p>Cheems</p></td>
                          <td>120000VND</td>
                          <td>20</td>
                          <td>16/10/2020</td>
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

