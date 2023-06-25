<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rentbook-App | Biodata</title>
  <!-- Custom fonts for this template-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  
  <style>
    .center-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }
  </style>
</head>
<body class="bg-gradient-primary">
  <div class="center-content">
    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Biodata Form</h1>
              </div>
              <form action="{{ route('biodata.save') }}" method="POST" class="user">
                @csrf
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Name">
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="address" type="text" class="form-control form-control-user @error('address') is-invalid @enderror" id="exampleInputAddress" placeholder="Address">
                  @error('address')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" id="exampleInputPhone" placeholder="Phone Number">
                  @error('phone')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Save Biodata</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah mengisi biodata? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>