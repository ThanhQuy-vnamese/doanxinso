@extends('Backend.layouts.indexadmin')

@section('content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ship đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">shipdonhang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              
              
                        <div class="card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Form</h3>
                          </div>
                          <form role="form">
                            <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-6">
                                    <label>Họ và tên</label>
                                    <input type="text" name="ten" class="form-control" placeholder="nhập tên">
                                  </div>
                                  <div class="form-group col-6">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control" placeholder="nhập địa chỉ">
                                  </div>
                              </div> 
                              <div class="row">
                                  <div class="form-group col-6">
                                    <label>Tên cơ quan</label>
                                    <input type="text" name="tencoquan" class="form-control" placeholder="nhập tên cơ quan">
                                  </div>
                                  <div class="form-group col-6">
                                    <label>Thành phố</label>
                                    <input type="text" name="thanhpho" class="form-control" placeholder="nhập thành phố">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-6">
                                    <label>Post(zip code)</label>
                                    <input type="text" name="postzipcode" class="form-control" placeholder="nhập post(zip code)">
                                  </div>
                                  <div class="form-group col-6">
                                    <label>Số điện thoại</label>
                                    <input type="number" name="sdt" class="form-control" placeholder="nhập số điện thoại">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-6">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="nhập email">
                                  </div>
                              </div>
                              <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </form>
                        </div>
                
                
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
  
  <script>
  $(function () {
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
  })
</script>
@endsection