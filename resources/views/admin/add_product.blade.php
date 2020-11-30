@extends('admin.layouts.dashboard')
@section('contentAdmin')
<section id="main-content">
    <section class="wrapper">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4>Thêm sản phẩm</h4>                     
                    
                    <div class="form-group float-right mr-3">
                      <label for="option">Thêm thuộc tính</label>
                      <select class="form-control" id="option">
                        <option>Kích cỡ</option>
                        <option>Năm sản xuất</option>
                  
                      </select>
                      <a href="" class="btn btn-sm btn-info mt-2">Thêm</a>
                    </div>
                </div>

                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="nameProduct">Tên sản phẩm *</label>
                      <input type="text" class="form-control" id="nameProduct" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                      <label for="size">Chọn kích cỡ</label>
                      <select class="form-control" id="size">
                        <option>500ml</option>
                        <option>700ml</option>
                  
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="thumbnail">Hình ảnh sản phẩm</label>
                      <input type="file" class="form-control" id="thumbnail">
                    </div>
                    <div class="form-group">
                      <label for="codepro">Mã sản phẩm *</label>
                      <input type="text" class="form-control" id="codepro" placeholder="Nhập mã sản phẩm">
                    </div>
                    <div class="form-group">
                      <label for="price">Giá *</label>
                      <input type="number" class="form-control" id="price" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                      <label for="discount">Giá giảm</label>
                      <input type="text" class="form-control" id="discount" placeholder="Nhập giá giảm sản phẩm">
                    </div>
                    <div class="form-group">
                      <label for="nation">Quốc gia *</label>
                      <input type="text" class="form-control" id="nation" placeholder="Nhập quốc gia">
                    </div>
                    <div class="form-group">
                      <label for="amount">Số lượng *</label>
                      <input type="number" class="form-control" id="amount" placeholder="Nhập số lượng sản phẩm">
                    </div>
                    <div class="form-group">
                      <label for="categories">Chọn danh mục *</label>
                      <select class="form-control" multiple id="categories">
                        <option>White wine</option>
                        <option>Red wine</option>
                        <option>Rose wine</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="details">Mô tả</label>
                      <textarea class="form-control" id="details" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Tags</label>
                      <div class="" id="tags">

                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="is_public">Hiển thị sản phẩm</label>
                      <select class="form-control"  id="is_public">
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="especial">Đặc biệt</label>
                      <select class="form-control" id="especial">
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="language">Ngôn ngữ</label>
                      <select class="form-control" id="especial">
                        <option value="1">Việt Nam</option>
                        <option value="0">English</option>
                      </select>
                    </div>
                    <button class="btn btn-success" type="submit">Thêm</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </section>
  </section>
@endsection


