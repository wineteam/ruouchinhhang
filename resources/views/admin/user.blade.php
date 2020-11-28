@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('listuser')}}</h4>
                    <form class="form-inline float-left">

                      <div class="form-group mx-sm-3 mb-2">

                        <input type="text" class="form-control" id="SearchRow" placeholder="...">
                      </div>
                      <button type="submit" class="btn btn-info mb-2">{{__('search')}}</button>
                    </form>

                    <a href="{{route('MngUser.addnew')}}" class="btn btn-sm btn-warning float-right">{{__('addnew')}}</a>
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
                            <th scope="col" width="200">{{__('name')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Phone')}}</th>
                            <th scope="col">{{__('address')}}</th>
                            <th scope="col" width="129">{{__('Action')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                          @foreach ($users as $user)
                            <tr>
                              <td><input type="checkbox"></td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->phone}}</td>
                              <td>{{$user->address}}</td>
                              <td>
                                  <div style="display: flex;justify-content: space-between">
                                      <a href="{{route('MngUser.edit',$user->id)}}" class="btn btn-sm btn-primary">{{__('edit')}}</a>
                                      <form action="{{route('MngUser.destroy',$user->id)}}" id="delete_user_{{$user->id}}"  method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-danger deleteItem">{{__('delete')}}</button>
                                      </form>
                                  </div>
                              </td>
                            </tr>
                          @endforeach
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
  <div class="col-md-12" style="display: flex;justify-content: center">
    {{$users->links()}}
  </div>
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

